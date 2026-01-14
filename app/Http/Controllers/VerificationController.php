<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Services\QRCodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VerificationController extends Controller
{
    protected $qrService;

    public function __construct(QRCodeService $qrService)
    {
        $this->qrService = $qrService;
    }

    /**
     * Show batch verification page
     */
    public function show($batchId)
    {
        try {
            $batch = Batch::where('batch_id', $batchId)->firstOrFail();

            // Get verification status
            $verificationStatus = $this->qrService->getVerificationStatus($batch);

            // Mark as verified if not already
            if (!$batch->isVerified()) {
                $batch->markAsVerified();
                Log::info('Batch verified', ['batchId' => $batchId]);
            }

            return view('verify.batch', [
                'batch' => $batch,
                'verification' => $verificationStatus,
                'batchData' => $batch->batch_data
            ]);

        } catch (\Exception $e) {
            Log::error('Batch verification failed', [
                'batchId' => $batchId,
                'error' => $e->getMessage()
            ]);

            return view('verify.error', [
                'batchId' => $batchId,
                'error' => 'Batch verification failed. Please contact support.'
            ]);
        }
    }

    /**
     * API endpoint for batch verification
     */
    public function verify(Request $request, $batchId)
    {
        try {
            $batch = Batch::where('batch_id', $batchId)->firstOrFail();

            // If QR data is provided, verify it matches
            if ($request->has('qrData')) {
                $qrData = json_decode($request->get('qrData'), true);
                $isValid = $this->qrService->verifyBatchData($qrData, $batch);

                if (!$isValid) {
                    return response()->json([
                        'valid' => false,
                        'message' => 'QR code data does not match batch records'
                    ], 400);
                }
            }

            $verificationStatus = $this->qrService->getVerificationStatus($batch);

            return response()->json([
                'valid' => true,
                'verification' => $verificationStatus,
                'message' => 'Batch verified successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('Batch verification API failed', [
                'batchId' => $batchId,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'valid' => false,
                'message' => 'Batch verification failed'
            ], 500);
        }
    }

    /**
     * Download QR code
     */
    public function download($batchId)
    {
        try {
            $batch = Batch::where('batch_id', $batchId)->firstOrFail();

            if (!$batch->qr_code) {
                abort(404, 'QR code not found');
            }

            // Return QR code as downloadable image
            $qrData = substr($batch->qr_code, strpos($batch->qr_code, ',') + 1);
            $qrImage = base64_decode($qrData);

            return response($qrImage)
                ->header('Content-Type', 'image/png')
                ->header('Content-Disposition', 'attachment; filename="' . $batchId . '.png"');

        } catch (\Exception $e) {
            Log::error('QR download failed', [
                'batchId' => $batchId,
                'error' => $e->getMessage()
            ]);

            abort(404, 'QR code not found');
        }
    }
}
