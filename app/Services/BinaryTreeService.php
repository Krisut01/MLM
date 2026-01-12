<?php

namespace App\Services;

use App\Models\BinaryTree;
use App\Models\User;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Binary Tree Service
 * 
 * Handles all binary tree operations including:
 * - User placement (extreme left algorithm)
 * - Volume updates
 * - Tree traversal
 * 
 * Based on LeafChain business requirements from binaryextracted.md
 */
class BinaryTreeService
{
    /**
     * Place user in binary tree using extreme left strategy
     *
     * @param User $user
     * @param Package $package
     * @return BinaryTree
     */
    public function placeUser(User $user, Package $package)
    {
        DB::beginTransaction();
        try {
            // 1. Find placement position
            $position = $this->findPlacementPosition($user->sponsor_id);
            
            // 2. Create binary tree entry
            $binaryTree = BinaryTree::create([
                'user_id' => $user->id,
                'sponsor_id' => $user->sponsor_id,
                'upline_id' => $position['upline_id'],
                'position' => $position['side'], // 'left' or 'right'
                'left_volume' => 0,
                'right_volume' => 0,
                'left_carry' => 0,
                'right_carry' => 0,
                'pairs_today' => 0,
                'last_pair_date' => now()
            ]);
            
            Log::info('User placed in binary tree', [
                'user_id' => $user->id,
                'upline_id' => $position['upline_id'],
                'position' => $position['side'],
                'points' => $package->points
            ]);
            
            // 3. Update upline volumes
            $this->updateUplineVolumes($user->id, $package->points);
            
            DB::commit();
            return $binaryTree;
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Binary tree placement failed', [
                'user_id' => $user->id,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }
    
    /**
     * Find extreme left position under sponsor
     * 
     * Algorithm:
     * 1. Start from sponsor
     * 2. Go left as far as possible
     * 3. If left is occupied, go right
     * 4. Repeat until empty position found
     *
     * @param int $sponsorId
     * @return array ['upline_id' => int, 'side' => 'left'|'right']
     */
    private function findPlacementPosition($sponsorId)
    {
        if (!$sponsorId) {
            return ['upline_id' => null, 'side' => 'left'];
        }
        
        $currentUserId = $sponsorId;
        
        while (true) {
            // Check if left position is empty
            $leftChild = BinaryTree::where('upline_id', $currentUserId)
                ->where('position', 'left')
                ->first();
                
            if (!$leftChild) {
                return [
                    'upline_id' => $currentUserId,
                    'side' => 'left'
                ];
            }
            
            // Check if right position is empty
            $rightChild = BinaryTree::where('upline_id', $currentUserId)
                ->where('position', 'right')
                ->first();
                
            if (!$rightChild) {
                return [
                    'upline_id' => $currentUserId,
                    'side' => 'right'
                ];
            }
            
            // Both occupied, go deeper (extreme left)
            $currentUserId = $leftChild->user_id;
        }
    }
    
    /**
     * Update volumes for all uplines recursively
     * 
     * When a user is placed, add their points to all uplines' volumes
     * on the correct side (left or right)
     *
     * @param int $userId
     * @param int $points
     * @return void
     */
    public function updateUplineVolumes($userId, $points)
    {
        $currentTree = BinaryTree::where('user_id', $userId)->first();
        
        if (!$currentTree) {
            return;
        }
        
        $updatedCount = 0;
        
        while ($currentTree && $currentTree->upline_id) {
            $uplineTree = BinaryTree::where('user_id', $currentTree->upline_id)->first();
            
            if (!$uplineTree) {
                break;
            }
            
            if ($currentTree->position === 'left') {
                $uplineTree->increment('left_volume', $points);
            } else {
                $uplineTree->increment('right_volume', $points);
            }
            
            $updatedCount++;
            Log::info('Updated upline volume', [
                'upline_id' => $uplineTree->user_id,
                'side' => $currentTree->position,
                'points' => $points,
                'new_left' => $uplineTree->left_volume + ($currentTree->position === 'left' ? $points : 0),
                'new_right' => $uplineTree->right_volume + ($currentTree->position === 'right' ? $points : 0)
            ]);
            
            $currentTree = $uplineTree;
        }
        
        Log::info('Upline volumes updated', [
            'user_id' => $userId,
            'levels_updated' => $updatedCount
        ]);
    }
    
    /**
     * Get user's genealogy tree
     *
     * @param int $userId
     * @param int $levels
     * @return array
     */
    public function getGenealogy($userId, $levels = 3)
    {
        $tree = BinaryTree::where('user_id', $userId)->first();
        
        if (!$tree) {
            return [];
        }
        
        return $this->buildTreeRecursive($tree->user_id, $levels);
    }
    
    /**
     * Build tree recursively
     *
     * @param int $userId
     * @param int $levels
     * @return array
     */
    private function buildTreeRecursive($userId, $levels)
    {
        if ($levels <= 0) {
            return [];
        }
        
        $tree = BinaryTree::with('user')->where('user_id', $userId)->first();
        
        if (!$tree) {
            return [];
        }
        
        $leftChild = BinaryTree::where('upline_id', $userId)
            ->where('position', 'left')
            ->first();
            
        $rightChild = BinaryTree::where('upline_id', $userId)
            ->where('position', 'right')
            ->first();
        
        return [
            'user_id' => $userId,
            'name' => $tree->user->name ?? 'Unknown',
            'left_volume' => $tree->left_volume,
            'right_volume' => $tree->right_volume,
            'left' => $leftChild ? $this->buildTreeRecursive($leftChild->user_id, $levels - 1) : null,
            'right' => $rightChild ? $this->buildTreeRecursive($rightChild->user_id, $levels - 1) : null
        ];
    }
}
