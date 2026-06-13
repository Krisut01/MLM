<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="lc-page lc-polish py-12 min-h-[calc(100vh-8rem)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow p-6 border border-gray-200">
                    <div class="text-sm text-gray-500">Users</div>
                    <div class="text-3xl font-bold text-gray-900">{{ number_format($stats['users']) }}</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 border border-gray-200">
                    <div class="text-sm text-gray-500">Transactions</div>
                    <div class="text-3xl font-bold text-gray-900">{{ number_format($stats['transactions']) }}</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 border border-gray-200">
                    <div class="text-sm text-gray-500">Completed Volume</div>
                    <div class="text-3xl font-bold text-gray-900">${{ number_format($stats['earnings'], 2) }}</div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-6 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Links</h3>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('admin.landing') }}" class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">Edit Landing Page</a>
                    <a href="{{ route('admin.testimonials') }}" class="px-4 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700">Manage Testimonials</a>
                    <a href="{{ route('admin.users') }}" class="px-4 py-2 rounded-lg bg-gray-800 text-white hover:bg-black dark:bg-gray-700 dark:hover:bg-gray-600">Users</a>
                    <a href="{{ route('admin.transactions') }}" class="px-4 py-2 rounded-lg bg-gray-800 text-white hover:bg-black dark:bg-gray-700 dark:hover:bg-gray-600">Transactions</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

