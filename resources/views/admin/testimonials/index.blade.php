<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Testimonials
            </h2>
            <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700">Add Testimonial</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50 dark:bg-gray-900/40">
                            <tr>
                                <th class="text-left text-xs font-semibold text-gray-600 dark:text-gray-300 px-6 py-3">Name</th>
                                <th class="text-left text-xs font-semibold text-gray-600 dark:text-gray-300 px-6 py-3">Quote</th>
                                <th class="text-left text-xs font-semibold text-gray-600 dark:text-gray-300 px-6 py-3">Active</th>
                                <th class="text-left text-xs font-semibold text-gray-600 dark:text-gray-300 px-6 py-3">Sort</th>
                                <th class="text-right text-xs font-semibold text-gray-600 dark:text-gray-300 px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($testimonials as $t)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                        <div class="font-semibold">{{ $t->name }}</div>
                                        @if($t->title)<div class="text-xs text-gray-500">{{ $t->title }}</div>@endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">
                                        <div class="line-clamp-2">{{ $t->quote }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        @if($t->is_active)
                                            <span class="px-2 py-1 rounded-full text-xs bg-emerald-100 text-emerald-800">Yes</span>
                                        @else
                                            <span class="px-2 py-1 rounded-full text-xs bg-gray-200 text-gray-800">No</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">{{ $t->sort_order }}</td>
                                    <td class="px-6 py-4 text-sm text-right">
                                        <a href="{{ route('admin.testimonials.edit', $t) }}" class="text-blue-600 hover:underline">Edit</a>
                                        <form method="POST" action="{{ route('admin.testimonials.delete', $t) }}" class="inline">
                                            @csrf
                                            <button class="ml-3 text-red-600 hover:underline" onclick="return confirm('Delete this testimonial?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">No testimonials yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-6">
                    {{ $testimonials->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

