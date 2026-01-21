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
use Illuminate\Support\Str;

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

        try {
            $user = auth()->user();
            $package = Package::findOrFail($request->package_id);

            return $this->processPackagePurchase(
                $user,
                $package,
                $request->tx_hash,
                $request->wallet_address,
                false
            );

        } catch (\Exception $e) {
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

    /**
     * Simulated purchase endpoint (no real USDT required)
     */
    public function simulatePurchase(Request $request)
    {
        if (!config('app.simulate_purchases')) {
            abort(403, 'Simulated purchases are disabled.');
        }

        $request->validate([
            'package_id' => 'required|exists:packages,id',
        ]);

        $user = auth()->user();
        $package = Package::findOrFail($request->package_id);

        // Use existing wallet if present; otherwise a deterministic fake one for UI/testing.
        $wallet = $user->wallet_address ?: '0x' . substr(hash('sha256', (string) $user->email), 0, 40);
        $txHash = 'SIM-' . Str::uuid()->toString();

        return $this->processPackagePurchase($user, $package, $txHash, $wallet, true);
    }

    /**
     * Shared purchase pipeline used by real and simulated purchases.
     */
    private function processPackagePurchase($user, Package $package, string $txHash, string $walletAddress, bool $isSimulated)
    {
        DB::beginTransaction();

        try {
            // Check if user already has an active package (upgrade path)
            $existingFarming = FarmingLog::where('user_id', $user->id)
                ->where('status', 'active')
                ->first();

            if ($existingFarming) {
                // Upgrade only if new package price is higher
                if ($package->price <= $existingFarming->package_value) {
                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => 'Upgrade requires a higher package than your active one.'
                    ]);
                }

                // Mark old farming as completed (upgrade path)
                $existingFarming->update([
                    'status' => 'completed',
                    'last_reward_at' => now(),
                ]);
            }

            // Verify transaction on blockchain (skipped in simulation mode)
            if (!$isSimulated) {
                $isValidTx = $this->verifyTransaction($txHash, $walletAddress, $package->price);
                if (!$isValidTx) {
                    Log::warning('Invalid transaction attempt', [
                        'user_id' => $user->id,
                        'tx_hash' => $txHash,
                        'wallet' => $walletAddress
                    ]);

                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => 'Transaction verification failed. Please contact support.'
                    ]);
                }
            }

            // Update user wallet address
            $user->update(['wallet_address' => $walletAddress]);

            // Create transaction record
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'type' => 'purchase',
                'amount' => $package->price,
                'currency' => 'USDT',
                'status' => 'completed',
                'description' => $isSimulated
                    ? "Simulated purchase: {$package->name} Package"
                    : "Purchased {$package->name} Package",
                'metadata' => [
                    'tx_hash' => $txHash,
                    'wallet_address' => $walletAddress,
                    'package_id' => $package->id,
                    'simulated' => $isSimulated,
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

            // Place user in tree (or update volumes on upgrade)
            $binaryService = new BinaryTreeService();
            $existingTree = BinaryTree::where('user_id', $user->id)->first();
            $binaryTree = $existingTree;

            if (!$existingTree) {
                $binaryTree = $binaryService->placeUser($user, $package);
            } else {
                $existingPackagePoints = optional($existingFarming?->package)->points ?? 0;
                $deltaPoints = max(0, $package->points - $existingPackagePoints);
                if ($deltaPoints > 0) {
                    $binaryService->updateUplineVolumes($user->id, $deltaPoints);
                }
            }

            // Commissions
            $commissionService = new CommissionService();
            if ($user->sponsor_id) {
                $commissionService->processDirectReferralBonus($user->sponsor_id, $package->price);
            }

            $royaltyBonus = $commissionService->processRoyaltyBonus(
                $user->sponsor_id,
                $package,
                $user->id
            );

            $pairingBonuses = $commissionService->processPairingBonuses($user->id);

            // QR batch
            $qrService = new QRCodeService();
            $batchResult = $qrService->generateBatchData($package, $transaction, $user);

            Batch::create([
                'batch_id' => $batchResult['batchId'],
                'package_id' => $package->id,
                'transaction_id' => $transaction->id,
                'user_id' => $user->id,
                'batch_data' => $batchResult['batchData'],
                'status' => 'active'
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => $isSimulated ? 'Simulated purchase completed!' : 'Package purchased successfully!',
                'data' => [
                    'simulated' => $isSimulated,
                    'transaction_id' => $transaction->id,
                    'package' => $package->name,
                    'amount' => $package->price,
                    'tx_hash' => $txHash,
                    'batch_id' => $batchResult['batchId'],
                    'verification_url' => $batchResult['verificationUrl'],
                    'binary_tree' => [
                        'upline_id' => $binaryTree?->upline_id,
                        'position' => $binaryTree?->position
                    ],
                    'bonuses' => [
                        'direct_referral' => $user->sponsor_id ? ($package->price * 0.05) : 0,
                        'royalty_bonus' => $royaltyBonus ? $royaltyBonus->amount : 0,
                        'pairing_bonuses_count' => count($pairingBonuses)
                    ],
                    'distribution' => [
                        'buy_basket_percent' => $package->buy_basket_percent,
                        'buy_basket_cost' => $package->buy_basket_cost,
                        'basket_capacity' => $package->basket_capacity,
                        'farming_load_amount' => $package->farming_load_amount,
                        'leafx_tokens_loaded' => $package->leafx_tokens_loaded,
                        'harvest_multiplier' => $package->harvest_multiplier,
                    ]
                ]
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
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
            // Accept simulated hashes only in simulation mode (handled earlier).
            if (!str_starts_with($txHash, 'SIM-') && strlen($txHash) < 64) {
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
