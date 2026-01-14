<?php

namespace App\Services;

use App\Models\Package;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class QRCodeService
{
    /**
     * Generate batch data for QR code (QR generation happens in frontend)
     */
    public function generateBatchData(Package $package, Transaction $transaction, User $user)
    {
        try {
            // Create unique batch ID
            $batchId = 'BATCH-' . $package->id . '-' . $transaction->id . '-' . time();

            // Prepare batch data for QR code
            $batchData = [
                'batchId' => $batchId,
                'packageType' => $package->name,
                'packageId' => $package->id,
                'purchaseId' => $transaction->id,
                'buyerAddress' => $user->wallet_address ?: 'Not connected',
                'purchaseDate' => now()->toISOString(),
                'blockchainTx' => $transaction->tx_hash ?? null,
                'verificationUrl' => url('/verify/' . $batchId),
                'amount' => $package->price,
                'currency' => 'USDT',
                'generatedAt' => now()->toISOString(),
                'platform' => 'LeafChain',
                'version' => '1.0'
            ];

            Log::info('Batch data generated successfully', [
                'batchId' => $batchId,
                'packageId' => $package->id,
                'userId' => $user->id
            ]);

            return [
                'batchId' => $batchId,
                'batchData' => $batchData,
                'verificationUrl' => $batchData['verificationUrl']
            ];

        } catch (\Exception $e) {
            Log::error('Batch data generation failed', [
                'packageId' => $package->id,
                'transactionId' => $transaction->id,
                'userId' => $user->id,
                'error' => $e->getMessage()
            ]);

            throw $e;
        }
    }

    /**
     * Verify batch data integrity
     */
    public function verifyBatchData($batchData, Batch $batch)
    {
        try {
            // Check if batch data matches stored data
            $storedData = $batch->batch_data;

            if (!$storedData) {
                return false;
            }

            // Compare key fields
            return $batchData['batchId'] === $storedData['batchId'] &&
                   $batchData['packageId'] == $storedData['packageId'] &&
                   $batchData['purchaseId'] == $storedData['purchaseId'];

        } catch (\Exception $e) {
            Log::error('Batch verification failed', [
                'batchId' => $batch->batch_id,
                'error' => $e->getMessage()
            ]);

            return false;
        }
    }

    /**
     * Get batch verification status
     */
    public function getVerificationStatus(Batch $batch)
    {
        $status = [
            'isVerified' => $batch->isVerified(),
            'batchId' => $batch->batch_id,
            'status' => $batch->status,
            'verifiedAt' => $batch->verified_at?->toISOString(),
            'packageName' => $batch->package->name,
            'purchaseDate' => $batch->created_at->toISOString(),
            'buyerAddress' => $batch->user->wallet_address,
            'transactionHash' => $batch->transaction->tx_hash,
            'verificationUrl' => url('/verify/' . $batch->batch_id)
        ];

        // Add blockchain verification if hash exists
        if ($batch->blockchain_hash) {
            $status['blockchainVerified'] = true;
            $status['blockchainHash'] = $batch->blockchain_hash;
        }

        return $status;
    }
}