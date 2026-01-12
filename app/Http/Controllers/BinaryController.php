<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BinaryTree;
use App\Models\FarmingLog;

class BinaryController extends Controller
{
    /**
     * Display the user's binary tree network
     */
    public function index()
    {
        $user = auth()->user();
        
        // Get user's binary tree record
        $userTree = BinaryTree::where('user_id', $user->id)->first();
        
        // Get direct downlines (users sponsored by this user)
        $directDownlines = User::where('sponsor_id', $user->id)
            ->with(['binaryTree', 'farmingLogs'])
            ->get();
            
        // Get all binary tree nodes under this user
        $treeData = $this->buildTreeData($user->id);
        
        // Get network statistics
        $stats = $this->getNetworkStats($user->id);
        
        return view('binary.index', compact('user', 'userTree', 'directDownlines', 'treeData', 'stats'));
    }
    
    /**
     * Build hierarchical tree data for visualization
     */
    private function buildTreeData($userId, $depth = 0, $maxDepth = 5)
    {
        if ($depth >= $maxDepth) {
            return null;
        }
        
        $user = User::find($userId);
        if (!$user) {
            return null;
        }
        
        $tree = BinaryTree::where('user_id', $userId)->first();
        $farmingLog = FarmingLog::where('user_id', $userId)
            ->where('status', 'active')
            ->first();
        
        // Find left and right children
        $leftChild = null;
        $rightChild = null;
        
        if ($tree) {
            $leftTree = BinaryTree::where('upline_id', $userId)
                ->where('position', 'left')
                ->first();
            $rightTree = BinaryTree::where('upline_id', $userId)
                ->where('position', 'right')
                ->first();
                
            if ($leftTree) {
                $leftChild = $this->buildTreeData($leftTree->user_id, $depth + 1, $maxDepth);
            }
            if ($rightTree) {
                $rightChild = $this->buildTreeData($rightTree->user_id, $depth + 1, $maxDepth);
            }
        }
        
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'sponsor_id' => $user->sponsor_id,
            'has_package' => $farmingLog ? true : false,
            'package_value' => $farmingLog ? $farmingLog->package_value : 0,
            'left_volume' => $tree ? $tree->left_volume : 0,
            'right_volume' => $tree ? $tree->right_volume : 0,
            'position' => $tree ? $tree->position : null,
            'left' => $leftChild,
            'right' => $rightChild,
            'depth' => $depth,
        ];
    }
    
    /**
     * Get network statistics
     */
    private function getNetworkStats($userId)
    {
        // Total downlines (all levels)
        $allDownlines = $this->countAllDownlines($userId);
        
        // Active downlines (with packages)
        $activeDownlines = User::whereHas('farmingLogs', function($q) {
            $q->where('status', 'active');
        })->where('sponsor_id', $userId)->count();
        
        // Direct referrals
        $directReferrals = User::where('sponsor_id', $userId)->count();
        
        // Binary tree volumes
        $tree = BinaryTree::where('user_id', $userId)->first();
        
        return [
            'total_downlines' => $allDownlines,
            'active_downlines' => $activeDownlines,
            'direct_referrals' => $directReferrals,
            'left_volume' => $tree ? $tree->left_volume : 0,
            'right_volume' => $tree ? $tree->right_volume : 0,
            'balance_ratio' => $tree && $tree->right_volume > 0 
                ? round(($tree->left_volume / $tree->right_volume) * 100, 2) 
                : 0,
        ];
    }
    
    /**
     * Recursively count all downlines
     */
    private function countAllDownlines($userId, $counted = [])
    {
        if (in_array($userId, $counted)) {
            return 0;
        }
        
        $counted[] = $userId;
        $count = 0;
        
        $children = User::where('sponsor_id', $userId)->get();
        foreach ($children as $child) {
            $count++;
            $count += $this->countAllDownlines($child->id, $counted);
        }
        
        return $count;
    }
}
