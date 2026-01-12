<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Binary Tree Network') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Network Overview Header --}}
            <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-2xl p-6 mb-6 shadow-xl">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div>
                        <h3 class="text-white font-bold text-2xl mb-2">🌳 Your Binary Network</h3>
                        <p class="text-purple-100 text-sm">Monitor your team growth and binary tree structure</p>
                    </div>
                    <div class="mt-4 md:mt-0 grid grid-cols-2 gap-4">
                        <div class="bg-white bg-opacity-20 rounded-lg p-3 text-center backdrop-blur-sm">
                            <p class="text-purple-100 text-xs mb-1">Total Team</p>
                            <p class="text-white font-bold text-2xl">{{ $stats['total_downlines'] }}</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-3 text-center backdrop-blur-sm">
                            <p class="text-purple-100 text-xs mb-1">Active</p>
                            <p class="text-white font-bold text-2xl">{{ $stats['active_downlines'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Network Statistics Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg transition-all hover:shadow-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                                <svg class="w-8 h-8 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Network</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $stats['total_downlines'] }}</p>
                                <p class="text-xs text-gray-400 mt-1">All levels</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg transition-all hover:shadow-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 dark:bg-green-900">
                                <svg class="w-8 h-8 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Active Members</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $stats['active_downlines'] }}</p>
                                <p class="text-xs text-gray-400 mt-1">With packages</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg transition-all hover:shadow-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900">
                                <svg class="w-8 h-8 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Left Volume</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $stats['left_volume'] }}</p>
                                <p class="text-xs text-gray-400 mt-1">Points</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg transition-all hover:shadow-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-orange-100 dark:bg-orange-900">
                                <svg class="w-8 h-8 text-orange-600 dark:text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Right Volume</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $stats['right_volume'] }}</p>
                                <p class="text-xs text-gray-400 mt-1">Points</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Binary Tree Visualization --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                            </svg>
                            Binary Tree Structure
                        </h3>
                        <div class="flex space-x-4 text-xs">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-blue-500 mr-1"></div>
                                <span class="text-gray-600 dark:text-gray-400">You</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-green-500 mr-1"></div>
                                <span class="text-gray-600 dark:text-gray-400">Active</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-gray-400 mr-1"></div>
                                <span class="text-gray-600 dark:text-gray-400">Inactive</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto bg-gray-50 dark:bg-gray-900 rounded-lg p-6">
                        <div id="tree-container" class="flex justify-center min-w-full">
                            @if($treeData)
                                {!! renderTreeNode($treeData) !!}
                            @else
                                <div class="text-center text-gray-500 dark:text-gray-400 py-12">
                                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    <p class="font-medium">No binary tree data yet</p>
                                    <p class="text-sm mt-1">Purchase a package to get started!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Direct Downlines Table --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        Direct Referrals
                    </h3>
                    
                    @if($directDownlines->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Position</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Package</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Joined</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($directDownlines as $downline)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $downline->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ $downline->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if($downline->binaryTree)
                                                <span class="px-2 py-1 text-xs font-medium rounded {{ $downline->binaryTree->position === 'left' ? 'bg-purple-100 text-purple-800' : 'bg-orange-100 text-orange-800' }}">
                                                    {{ ucfirst($downline->binaryTree->position) }}
                                                </span>
                                            @else
                                                <span class="text-gray-400">Not Set</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 font-medium">
                                            @if($downline->farmingLogs->where('status', 'active')->first())
                                                ${{ number_format($downline->farmingLogs->where('status', 'active')->first()->package_value, 2) }}
                                            @else
                                                <span class="text-gray-400">-</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($downline->farmingLogs->where('status', 'active')->count() > 0)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Active
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    Inactive
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ $downline->created_at->format('M d, Y') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <p class="text-gray-500 dark:text-gray-400 font-medium">No direct referrals yet</p>
                            <p class="text-sm text-gray-400 mt-1">Share your referral link to grow your network!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .tree-node {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 30px;
            position: relative;
        }
        
        .tree-children {
            display: flex;
            justify-content: center;
            margin-top: 60px;
            position: relative;
        }
        
        .tree-children::before {
            content: '';
            position: absolute;
            top: -30px;
            left: 50%;
            width: 2px;
            height: 30px;
            background: linear-gradient(to bottom, #9ca3af 0%, #d1d5db 100%);
        }
        
        .tree-children > .tree-node:not(:last-child)::after {
            content: '';
            position: absolute;
            top: -30px;
            right: -30px;
            width: 60px;
            height: 2px;
            background: #d1d5db;
        }
        
        .tree-node-card {
            border: 3px solid #e5e7eb;
            border-radius: 12px;
            padding: 16px 20px;
            background: white;
            min-width: 180px;
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        
        .tree-node-card::before {
            content: '';
            position: absolute;
            top: -30px;
            left: 50%;
            width: 2px;
            height: 30px;
            background: #d1d5db;
            transform: translateX(-50%);
        }
        
        .tree-node:first-child > .tree-node-card::before {
            display: none;
        }
        
        .tree-node-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .tree-node-card.active {
            border-color: #10b981;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        }
        
        .tree-node-card.inactive {
            border-color: #d1d5db;
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        }
        
        .tree-node-card.current-user {
            border-color: #3b82f6;
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
        
        @media (prefers-color-scheme: dark) {
            .tree-node-card {
                background: #1f2937;
                border-color: #374151;
            }
            
            .tree-node-card.active {
                background: linear-gradient(135deg, #064e3b 0%, #065f46 100%);
                border-color: #10b981;
            }
            
            .tree-node-card.inactive {
                background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            }
            
            .tree-node-card.current-user {
                background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
                border-color: #3b82f6;
            }
        }
        
        .tree-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .tree-badge.you {
            background: #3b82f6;
            color: white;
        }
        
        .tree-badge.active {
            background: #10b981;
            color: white;
        }
        
        .tree-badge.inactive {
            background: #9ca3af;
            color: white;
        }
    </style>
</x-app-layout>

@php
function renderTreeNode($node, $isCurrentUser = true) {
    if (!$node) {
        return '<div class="tree-node"><div class="tree-node-card inactive"><p class="text-xs text-gray-400 dark:text-gray-500">Empty Slot</p><p class="text-xs text-gray-300 dark:text-gray-600 mt-1">Available</p></div></div>';
    }
    
    $hasPackage = $node['has_package'];
    $cardClass = $hasPackage ? 'active' : 'inactive';
    if ($isCurrentUser && $node['depth'] == 0) {
        $cardClass = 'current-user';
    }
    
    $badgeClass = '';
    $badgeText = '';
    if ($isCurrentUser && $node['depth'] == 0) {
        $badgeClass = 'you';
        $badgeText = 'YOU';
    } elseif ($hasPackage) {
        $badgeClass = 'active';
        $badgeText = 'ACTIVE';
    } else {
        $badgeClass = 'inactive';
        $badgeText = 'INACTIVE';
    }
    
    $html = '<div class="tree-node">';
    $html .= '<div class="tree-node-card ' . $cardClass . '">';
    
    // Badge
    $html .= '<div class="mb-2"><span class="tree-badge ' . $badgeClass . '">' . $badgeText . '</span></div>';
    
    // Name and ID
    $html .= '<p class="font-bold text-base text-gray-900 dark:text-gray-100">' . e($node['name']) . '</p>';
    $html .= '<p class="text-xs text-gray-500 dark:text-gray-400 mt-1">ID: ' . $node['id'] . '</p>';
    
    // Package info
    if ($hasPackage) {
        $html .= '<div class="mt-3 pt-3 border-t border-green-200 dark:border-green-800">';
        $html .= '<p class="text-sm font-bold text-green-700 dark:text-green-300">$' . number_format($node['package_value'], 2) . '</p>';
        $html .= '<p class="text-xs text-green-600 dark:text-green-400">Package Value</p>';
        $html .= '</div>';
    } else {
        $html .= '<div class="mt-3 pt-3 border-t border-gray-200 dark:border-gray-700">';
        $html .= '<p class="text-xs text-gray-400 dark:text-gray-500">No Package</p>';
        $html .= '</div>';
    }
    
    // Volumes
    if ($node['left_volume'] > 0 || $node['right_volume'] > 0) {
        $html .= '<div class="mt-2 flex justify-center space-x-3 text-xs font-medium">';
        $html .= '<div class="flex items-center">';
        $html .= '<svg class="w-3 h-3 mr-1 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"/></svg>';
        $html .= '<span class="text-purple-600 dark:text-purple-400">L:' . $node['left_volume'] . '</span>';
        $html .= '</div>';
        $html .= '<div class="flex items-center">';
        $html .= '<svg class="w-3 h-3 mr-1 text-orange-600" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"/></svg>';
        $html .= '<span class="text-orange-600 dark:text-orange-400">R:' . $node['right_volume'] . '</span>';
        $html .= '</div>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    
    // Render children
    if ($node['left'] || $node['right']) {
        $html .= '<div class="tree-children">';
        
        // Left child
        $html .= renderTreeNode($node['left'] ?? null, false);
        
        // Right child
        $html .= renderTreeNode($node['right'] ?? null, false);
        
        $html .= '</div>';
    }
    
    $html .= '</div>';
    
    return $html;
}
@endphp