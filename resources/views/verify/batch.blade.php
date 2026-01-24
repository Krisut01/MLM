<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 tracking-tight">
                    Batch Verification
                </h2>
                <p class="mt-2 text-gray-600">
                    Authenticating your LeafChain purchase
                </p>
            </div>
            <div class="flex items-center space-x-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Verified
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Verification Status -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-8">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-green-800">
                            ✅ Purchase Successfully Verified
                        </h3>
                        <p class="mt-1 text-sm text-green-700">
                            This batch has been authenticated on the Polygon blockchain.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Batch Details -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">
                        Batch Information
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Details for batch {{ $verification['batchId'] }}
                    </p>
                </div>

                <div class="px-6 py-6">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Batch ID</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-mono">{{ $verification['batchId'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Package Type</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $verification['packageName'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Purchase Date</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ \Carbon\Carbon::parse($verification['purchaseDate'])->format('M j, Y \a\t g:i A') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Buyer Address</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-mono break-all">{{ $verification['buyerAddress'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Verification Status</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ ucfirst($verification['status']) }}
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Blockchain Verified</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $verification['isVerified'] ? 'Yes' : 'No' }}
                                </span>
                            </dd>
                        </div>
                    </dl>

                    @if($verification['transactionHash'])
                    <div class="mt-6">
                        <dt class="text-sm font-medium text-gray-500 mb-2">Transaction Details</dt>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Transaction Hash</p>
                                    <p class="text-xs text-gray-500 font-mono break-all">{{ $verification['transactionHash'] }}</p>
                                </div>
                                <a href="https://mumbai.polygonscan.com/tx/{{ $verification['transactionHash'] }}"
                                   target="_blank"
                                   class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    View on PolygonScan
                                    <svg class="ml-1 -mr-0.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 001.414-1.414L12 2.586 4.707 9.293a1 1 0 00-1.414 1.414l8 8a1 1 0 010 1.414l-8-8z" clip-rule="evenodd"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- QR Code Display -->
            @if(isset($batch) && $batch->qr_code)
            <div class="mt-8 bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">
                        Your QR Code
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Keep this QR code as proof of your authentic LeafChain purchase
                    </p>
                </div>
                <div class="px-6 py-6 text-center">
                    <img src="{{ $batch->qr_code }}" alt="QR Code" class="mx-auto max-w-xs border border-gray-200 rounded-lg">
                    <p class="mt-4 text-sm text-gray-600">
                        This QR code contains your batch verification data and can be scanned anytime for authentication.
                    </p>
                    <a href="{{ route('verify.download', $batch->batch_id) }}"
                       class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Download QR Code
                    </a>
                </div>
            </div>
            @endif

            <!-- How It Works -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-blue-800">
                            How Batch Verification Works
                        </h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <ul class="list-disc list-inside space-y-1">
                                <li><strong>Unique Batch ID:</strong> Each purchase creates a unique batch identifier</li>
                                <li><strong>Blockchain Storage:</strong> Batch data is recorded on the Polygon blockchain</li>
                                <li><strong>QR Code:</strong> Contains encrypted batch information for easy verification</li>
                                <li><strong>Public Verification:</strong> Anyone can scan and verify the authenticity</li>
                                <li><strong>Immutable Record:</strong> Batch data cannot be altered once created</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
