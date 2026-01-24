<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left text-xs font-semibold text-gray-600 px-6 py-3">Name</th>
                                <th class="text-left text-xs font-semibold text-gray-600 px-6 py-3">Email</th>
                                <th class="text-left text-xs font-semibold text-gray-600 px-6 py-3">Admin</th>
                                <th class="text-left text-xs font-semibold text-gray-600 px-6 py-3">Active</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($users as $u)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900 font-semibold">{{ $u->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $u->email }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        @if($u->is_admin)
                                            <span class="px-2 py-1 rounded-full text-xs bg-purple-100 text-purple-800">Yes</span>
                                        @else
                                            <span class="px-2 py-1 rounded-full text-xs bg-gray-200 text-gray-800">No</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        @if($u->is_active)
                                            <span class="px-2 py-1 rounded-full text-xs bg-emerald-100 text-emerald-800">Yes</span>
                                        @else
                                            <span class="px-2 py-1 rounded-full text-xs bg-gray-200 text-gray-800">No</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

