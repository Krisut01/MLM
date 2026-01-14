<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Transaction;
use App\Models\BinaryTree;
use App\Models\FarmingLog;
use App\Models\User;
use App\Models\Batch;
use App\Services\BinaryTreeService;
use App\Services\CommissionService;
use App\Services\QRCodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('products')->where('is_active', true)->get();

        return view('packages.index', compact('packages'));
    }

    public function show(Package $package)
    {
        $package->load('products');
        return view('packages.show', compact('package'));
    }

    public function purchase(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'tx_hash' => 'required|string',
            'wallet_address' => 'required|string'
        ]);

        DB::beginTransaction();
        try {
            $user = auth()->user();
            $package = Package::findOrFail($request->package_id);

            // Check if user already has an active package
            $existingFarming = FarmingLog::where('user_id', $user->id)
                ->where('status', 'active')
                ->first();

            if ($existingFarming) {
                return response()->json([
                    'success' => false,
                    'message' => 'You already have an active farming package.'
                ]);
            }

            // Verify transaction on blockchain (simplified for demo)
            $isValidTx = $this->verifyTransaction($request->tx_hash, $request->wallet_address, $package->price);

            if (!$isValidTx) {
                Log::warning('Invalid transaction attempt', [
                    'user_id' => $user->id,
                    'tx_hash' => $request->tx_hash,
                    'wallet' => $request->wallet_address
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Transaction verification failed. Please contact support.'
                ]);
            }

            // Update user wallet address
            $user->update(['wallet_address' => $request->wallet_address]);

            // Create transaction record
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'type' => 'purchase',
                'amount' => $package->price,
                'currency' => 'USDT',
                'status' => 'completed',
                'description' => "Purchased {$package->name} Package",
                'metadata' => [
                    'tx_hash' => $request->tx_hash,
                    'wallet_address' => $request->wallet_address,
                    'package_id' => $package->id
                ]
            ]);

            // Create farming log
            FarmingLog::create([
                'user_id' => $user->id,
                'package_id' => $package->id,
                'daily_rate' => 0.0050, // 0.50%
                'total_earned' => 0,
                'package_value' => $package->price,
                'status' => 'active'
            ]);

            // ⭐ NEW: Use BinaryTreeService to place user in tree
            $binaryService = new BinaryTreeService();
            $binaryTree = $binaryService->placeUser($user, $package);
            
            Log::info('User placed in binary tree', [
                'user_id' => $user->id,
                'binary_tree_id' => $binaryTree->id,
                'upline_id' => $binaryTree->upline_id,
                'position' => $binaryTree->position
            ]);

            // ⭐ NEW: Use CommissionService to process bonuses
            $commissionService = new CommissionService();
            
            // Process direct referral bonus (10%)
            if ($user->sponsor_id) {
                $directBonus = $commissionService->processDirectReferralBonus(
                    $user->sponsor_id, 
                    $package->price
                );
                
                Log::info('Direct referral bonus processed', [
                    'sponsor_id' => $user->sponsor_id,
                    'amount' => $directBonus ? $directBonus->amount : 0
                ]);
            }
            
            // Process pairing bonuses for all uplines
            $pairingBonuses = $commissionService->processPairingBonuses($user->id);
            
            Log::info('Pairing bonuses processed', [
                'user_id' => $user->id,
                'bonuses_count' => count($pairingBonuses),
                'bonuses' => $pairingBonuses
            ]);

            // Generate QR code batch data
            $qrService = new QRCodeService();
            $batchResult = $qrService->generateBatchData($package, $transaction, $user);

            // Create batch record
            $batch = Batch::create([
                'batch_id' => $batchResult['batchId'],
                'package_id' => $package->id,
                'transaction_id' => $transaction->id,
                'user_id' => $user->id,
                'batch_data' => $batchResult['batchData'],
                'status' => 'active'
            ]);

            DB::commit();

            Log::info('Package purchase completed with QR batch', [
                'user_id' => $user->id,
                'package' => $package->name,
                'tx_hash' => $request->tx_hash,
                'batch_id' => $batchResult['batchId']
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Package purchased successfully!',
                'data' => [
                    'transaction_id' => $transaction->id,
                    'package' => $package->name,
                    'amount' => $package->price,
                    'batch_id' => $batchResult['batchId'],
                    'verification_url' => $batchResult['verificationUrl'],
                    'binary_tree' => [
                        'upline_id' => $binaryTree->upline_id,
                        'position' => $binaryTree->position
                    ],
                    'bonuses' => [
                        'direct_referral' => $user->sponsor_id ? ($package->price * 0.10) : 0,
                        'pairing_bonuses_count' => count($pairingBonuses)
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Package purchase failed', [
                'user_id' => auth()->id(),
                'package_id' => $request->package_id,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Purchase failed. Please try again or contact support.'
            ], 500);
        }
    }

    private function verifyTransaction($txHash, $walletAddress, $expectedAmount)
    {
        // In production, you would:
        // 1. Query the blockchain to verify the transaction
        // 2. Check if the transaction is confirmed
        // 3. Verify the amount and recipient
        // 4. Check for double-spending attempts

        // For demo purposes, we'll do basic validation
        try {
            // Simulate blockchain verification
            // In real implementation, use web3.php or similar
            if (strlen($txHash) < 64) {
                return false;
            }

            // Check if wallet address is valid
            if (!preg_match('/^0x[a-fA-F0-9]{40}$/', $walletAddress)) {
                return false;
            }

            // Simulate transaction verification delay
            sleep(1);

            return true; // Accept for demo

        } catch (\Exception $e) {
            Log::error('Transaction verification error', ['error' => $e->getMessage()]);
            return false;
        }
    }

    // ℹ️ OLD METHODS REMOVED - Now using BinaryTreeService and CommissionService
    // The logic has been moved to:
    // - app/Services/BinaryTreeService.php
    // - app/Services/CommissionService.php
}
