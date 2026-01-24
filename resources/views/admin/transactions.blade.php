<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transactions
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left text-xs font-semibold text-gray-600 px-6 py-3">Date</th>
                                <th class="text-left text-xs font-semibold text-gray-600 px-6 py-3">User</th>
                                <th class="text-left text-xs font-semibold text-gray-600 px-6 py-3">Type</th>
                                <th class="text-left text-xs font-semibold text-gray-600 px-6 py-3">Amount</th>
                                <th class="text-left text-xs font-semibold text-gray-600 px-6 py-3">Currency</th>
                                <th class="text-left text-xs font-semibold text-gray-600 px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($transactions as $tx)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $tx->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $tx->user_id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $tx->type }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 font-semibold">{{ number_format($tx->amount, 2) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $tx->currency }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $tx->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-6">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

