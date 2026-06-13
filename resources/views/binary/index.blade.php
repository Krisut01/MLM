<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Binary Tree Network') }}
        </h2>
    </x-slot>

    <div class="lc-page lc-polish py-12">
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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transition-all hover:shadow-lg border border-gray-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Total Network</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_downlines'] }}</p>
                                <p class="text-xs text-gray-400 mt-1">All levels</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transition-all hover:shadow-lg border border-gray-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Active Members</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['active_downlines'] }}</p>
                                <p class="text-xs text-gray-400 mt-1">With packages</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transition-all hover:shadow-lg border border-gray-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Left Volume</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['left_volume'] }}</p>
                                <p class="text-xs text-gray-400 mt-1">Points</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transition-all hover:shadow-lg border border-gray-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-orange-100">
                                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Right Volume</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['right_volume'] }}</p>
                                <p class="text-xs text-gray-400 mt-1">Points</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Binary Tree Visualization --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border border-gray-200">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-medium text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                            </svg>
                            Binary Tree Structure
                        </h3>
                        <div class="flex space-x-4 text-xs">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-blue-500 mr-1"></div>
                                <span class="text-gray-600">You</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-green-500 mr-1"></div>
                                <span class="text-gray-600">Active</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-gray-400 mr-1"></div>
                                <span class="text-gray-600">Inactive</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-4 md:p-6">
                        <!-- Tree Controls -->
                        <div class="flex flex-wrap items-center justify-between mb-4 gap-4">
                            <div class="flex items-center space-x-4">
                                <div class="text-sm text-gray-600">
                                    <span class="font-medium">Depth:</span> Limited to 10 levels for performance
                                </div>
                                <div class="text-sm text-gray-600">
                                    <span class="font-medium">Max nodes/level:</span> 100 for optimal display
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button id="zoom-in" class="px-3 py-1 bg-blue-100 hover:bg-blue-200 dark:bg-blue-950/50 dark:hover:bg-blue-900 text-blue-700 dark:text-blue-200 rounded text-sm font-medium transition-colors">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m-3-3h3m3 0h-3m-3-3h3"/>
                                    </svg>
                                    Zoom In
                                </button>
                                <button id="zoom-out" class="px-3 py-1 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200 rounded text-sm font-medium transition-colors">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM13 10H7"/>
                                    </svg>
                                    Zoom Out
                                </button>
                                <button id="fit-view" class="px-3 py-1 bg-green-100 hover:bg-green-200 dark:bg-green-950/50 dark:hover:bg-green-900 text-green-700 dark:text-green-200 rounded text-sm font-medium transition-colors">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 1v4m0 0h-4m4 0l-5-5"/>
                                    </svg>
                                    Fit View
                                </button>
                            </div>
                        </div>

                        <!-- Tree Container with improved responsiveness -->
                        <div class="relative overflow-auto bg-white rounded-lg shadow-inner border border-gray-200">
                            <div id="tree-container" class="min-h-[400px] p-4 transition-transform duration-300 ease-in-out"
                                 style="transform-origin: center top;">
                                @if($treeData)
                                    <div class="flex justify-center">
                                        {!! renderTreeNode($treeData) !!}
                                    </div>
                                @else
                                    <div class="text-center text-gray-500 py-12">
                                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                        <p class="font-medium">No binary tree data yet</p>
                                        <p class="text-sm mt-1">Purchase a package to get started!</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Performance Notice -->
                        @if($stats['total_downlines'] > 100)
                        <div class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div class="text-sm text-blue-800">
                                    <p class="font-medium text-blue-900">Large Network Detected</p>
                                    <p class="mt-1 text-blue-700">Your network has {{ $stats['total_downlines'] }} members. For optimal performance, the tree view is limited to 10 levels and 100 nodes per level. Use the zoom controls to navigate your tree effectively.</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Direct Downlines Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        Direct Referrals
                    </h3>
                    
                    @if($directDownlines->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Package</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($directDownlines as $downline)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/70 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $downline->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
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
                            <p class="text-gray-500 font-medium">No direct referrals yet</p>
                            <p class="text-sm text-gray-400 mt-1">Share your referral link to grow your network!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const treeContainer = document.getElementById('tree-container');
            let currentScale = 1;
            const minScale = 0.3;
            const maxScale = 2;
            const scaleStep = 0.2;

            // Zoom controls
            document.getElementById('zoom-in').addEventListener('click', function() {
                if (currentScale < maxScale) {
                    currentScale = Math.min(currentScale + scaleStep, maxScale);
                    updateTransform();
                } else {
                    // Visual feedback for disabled state
                    this.style.opacity = '0.5';
                    setTimeout(() => { this.style.opacity = '1'; }, 200);
                }
            });

            document.getElementById('zoom-out').addEventListener('click', function() {
                if (currentScale > minScale) {
                    currentScale = Math.max(currentScale - scaleStep, minScale);
                    updateTransform();
                } else {
                    // Visual feedback for disabled state
                    this.style.opacity = '0.5';
                    setTimeout(() => { this.style.opacity = '1'; }, 200);
                }
            });

            document.getElementById('fit-view').addEventListener('click', function() {
                currentScale = 1;
                updateTransform();
                // Scroll to center
                treeContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
            });

            function updateTransform() {
                treeContainer.style.transform = `scale(${currentScale})`;

                // Update button states and visibility
                const zoomInBtn = document.getElementById('zoom-in');
                const zoomOutBtn = document.getElementById('zoom-out');

                if (currentScale >= maxScale) {
                    zoomInBtn.disabled = true;
                    zoomInBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    zoomInBtn.classList.remove('hover:bg-blue-200', 'dark:hover:bg-blue-800');
                } else {
                    zoomInBtn.disabled = false;
                    zoomInBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    zoomInBtn.classList.add('hover:bg-blue-200', 'dark:hover:bg-blue-800');
                }

                if (currentScale <= minScale) {
                    zoomOutBtn.disabled = true;
                    zoomOutBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    zoomOutBtn.classList.remove('hover:bg-gray-200', 'dark:hover:bg-gray-700');
                } else {
                    zoomOutBtn.disabled = false;
                    zoomOutBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    zoomOutBtn.classList.add('hover:bg-gray-200', 'dark:hover:bg-gray-700');
                }
            }

            // Mouse wheel zoom
            treeContainer.addEventListener('wheel', function(e) {
                if (e.ctrlKey) {
                    e.preventDefault();
                    if (e.deltaY < 0 && currentScale < maxScale) {
                        currentScale = Math.min(currentScale + scaleStep, maxScale);
                    } else if (e.deltaY > 0 && currentScale > minScale) {
                        currentScale = Math.max(currentScale - scaleStep, minScale);
                    }
                    updateTransform();
                }
            });

            // Pan functionality (for touch devices)
            let isDragging = false;
            let startX, startY, scrollLeft, scrollTop;

            treeContainer.addEventListener('mousedown', function(e) {
                if (e.ctrlKey || e.metaKey) {
                    isDragging = true;
                    startX = e.pageX - treeContainer.offsetLeft;
                    startY = e.pageY - treeContainer.offsetTop;
                    treeContainer.style.cursor = 'grabbing';
                }
            });

            document.addEventListener('mousemove', function(e) {
                if (!isDragging) return;
                e.preventDefault();
                const x = e.pageX - treeContainer.offsetLeft;
                const y = e.pageY - treeContainer.offsetTop;
                const walkX = (x - startX) * 2;
                const walkY = (y - startY) * 2;
                treeContainer.scrollLeft = scrollLeft - walkX;
                treeContainer.scrollTop = scrollTop - walkY;
            });

            document.addEventListener('mouseup', function() {
                isDragging = false;
                treeContainer.style.cursor = 'default';
            });

            // Group node click handler (for future expansion)
            document.addEventListener('click', function(e) {
                if (e.target.closest('.group-node')) {
                    // Future: Implement group expansion
                    alert('Group expansion feature coming soon!');
                }
            });

            // Initialize
            updateTransform();
        });
    </script>

    <style>
        .tree-container-wrapper {
            position: relative;
            overflow: hidden;
        }

        .tree-node {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 15px;
            position: relative;
            flex-shrink: 0;
        }

        .tree-children {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin-top: 40px;
            position: relative;
            flex-wrap: nowrap;
        }

        .tree-children::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 50%;
            width: 2px;
            height: 20px;
            background: linear-gradient(to bottom, #9ca3af 0%, #d1d5db 100%);
        }

        .tree-children > .tree-node:not(:last-child)::after {
            content: '';
            position: absolute;
            top: -20px;
            right: -15px;
            width: 30px;
            height: 2px;
            background: #d1d5db;
        }

        .tree-node-card {
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 16px;
            background: white;
            min-width: 140px;
            max-width: 160px;
            text-align: center;
            box-shadow: 0 2px 4px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
            position: relative;
            word-wrap: break-word;
        }

        .tree-node-card::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 50%;
            width: 2px;
            height: 20px;
            background: #d1d5db;
            transform: translateX(-50%);
        }

        .tree-node:first-child > .tree-node-card::before {
            display: none;
        }

        .tree-node-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 12px -2px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .tree-node-card.group-node {
            border-color: #8b5cf6;
            background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
            cursor: pointer;
        }

        .dark {
            --tree-connector: #374151;
        }

        .dark .tree-children::before,
        .dark .tree-children > .tree-node:not(:last-child)::after,
        .dark .tree-node-card::before {
            background: #374151;
        }

        .dark .tree-node-card {
            color: #f9fafb;
        }

        .dark .tree-node-card .text-gray-900 {
            color: #f9fafb;
        }

        .dark .tree-node-card .text-gray-500,
        .dark .tree-node-card .text-gray-400 {
            color: #9ca3af;
        }

        .dark .tree-node-card .border-gray-200,
        .dark .tree-node-card .border-green-200,
        .dark .tree-node-card .border-purple-200 {
            border-color: #374151;
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

            .tree-node-card.group-node {
                background: linear-gradient(135deg, #2d1b69 0%, #1e1b4b 100%);
                border-color: #8b5cf6;
            }
        }

        .dark .tree-node-card {
            background: #1f2937;
            border-color: #374151;
        }

        .dark .tree-node-card.active {
            background: linear-gradient(135deg, #064e3b 0%, #065f46 100%);
            border-color: #10b981;
        }

        .dark .tree-node-card.inactive {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        }

        .dark .tree-node-card.current-user {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            border-color: #3b82f6;
        }

        .dark .tree-node-card.group-node {
            background: linear-gradient(135deg, #2d1b69 0%, #1e1b4b 100%);
            border-color: #8b5cf6;
        }

        .tree-badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 9px;
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

        /* Responsive breakpoints */
        @media (max-width: 768px) {
            .tree-node {
                margin: 0 8px;
                min-width: 120px;
            }

            .tree-node-card {
                min-width: 120px;
                max-width: 140px;
                padding: 8px 12px;
            }

            .tree-children > .tree-node:not(:last-child)::after {
                width: 16px;
                right: -8px;
            }
        }

        @media (max-width: 640px) {
            .tree-node {
                margin: 0 4px;
                min-width: 100px;
            }

            .tree-node-card {
                min-width: 100px;
                max-width: 120px;
                padding: 6px 8px;
            }

            .tree-children {
                margin-top: 30px;
            }

            .tree-badge {
                font-size: 8px;
                padding: 1px 4px;
            }
        }

        /* Zoom controls */
        .zoom-controls {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }

        /* Performance optimizations */
        .tree-node-card * {
            pointer-events: none;
        }

        .tree-node-card.group-node * {
            pointer-events: auto;
        }

        /* Ensure button text remains visible in all states */
        button:disabled {
            opacity: 0.5;
        }

        button:disabled:hover {
            background-color: inherit !important;
        }

        /* Improve focus visibility */
        button:focus {
            outline: 2px solid #3b82f6;
            outline-offset: 2px;
        }

        /* Dark mode button improvements */
        @media (prefers-color-scheme: dark) {
            button:focus {
                outline-color: #60a5fa;
            }
        }
    </style>
</x-app-layout>

@php
function renderTreeNode($node, $isCurrentUser = true) {
    if (!$node) {
        return '<div class="tree-node"><div class="tree-node-card inactive"><p class="text-xs text-gray-400">Empty Slot</p><p class="text-xs text-gray-300 mt-1">Available</p></div></div>';
    }

    // Handle group nodes (when there are too many children)
    if (isset($node['is_group']) && $node['is_group']) {
        $html = '<div class="tree-node">';
        $html .= '<div class="tree-node-card group-node" style="border-color: #8b5cf6; background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);">';
        $html .= '<div class="mb-2"><span class="tree-badge" style="background: #8b5cf6; color: white;">GROUP</span></div>';
        $html .= '<p class="font-bold text-base text-gray-900">' . e($node['name']) . '</p>';
        $html .= '<p class="text-xs text-purple-600 mt-1">Click to expand</p>';
        $html .= '<div class="mt-3 pt-3 border-t border-purple-200">';
        $html .= '<p class="text-sm font-bold text-purple-700">' . $node['group_count'] . ' members</p>';
        $html .= '<p class="text-xs text-purple-600">Too many to display</p>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
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

    // Name and ID (truncate long names)
    $name = strlen($node['name']) > 15 ? substr($node['name'], 0, 12) . '...' : $node['name'];
    $html .= '<p class="font-bold text-sm text-gray-900" title="' . e($node['name']) . '">' . e($name) . '</p>';
    $html .= '<p class="text-xs text-gray-500 mt-1">ID: ' . $node['id'] . '</p>';

    // Package info
    if ($hasPackage && $node['package_value'] > 0) {
        $html .= '<div class="mt-3 pt-3 border-t border-green-200">';
        $html .= '<p class="text-sm font-bold text-green-700">$' . number_format($node['package_value'], 0) . '</p>';
        $html .= '<p class="text-xs text-green-600">Package</p>';
        $html .= '</div>';
    } else {
        $html .= '<div class="mt-3 pt-3 border-t border-gray-200">';
        $html .= '<p class="text-xs text-gray-400">No Package</p>';
        $html .= '</div>';
    }

    // Volumes (only show if meaningful)
    if (($node['left_volume'] > 0 || $node['right_volume'] > 0) && $node['depth'] < 3) {
        $html .= '<div class="mt-2 flex justify-center space-x-2 text-xs font-medium">';
        if ($node['left_volume'] > 0) {
            $html .= '<div class="flex items-center">';
            $html .= '<span class="text-purple-600 font-bold">L:' . number_format($node['left_volume']) . '</span>';
            $html .= '</div>';
        }
        if ($node['right_volume'] > 0) {
            $html .= '<div class="flex items-center ml-2">';
            $html .= '<span class="text-orange-600 font-bold">R:' . number_format($node['right_volume']) . '</span>';
            $html .= '</div>';
        }
        $html .= '</div>';
    }

    $html .= '</div>';

    // Render children (with depth limiting for performance)
    $hasChildren = ($node['left'] || $node['right']);
    if ($hasChildren && $node['depth'] < 3) { // Limit depth for performance
        $html .= '<div class="tree-children">';

        // Left child
        $html .= renderTreeNode($node['left'] ?? null, false);

        // Right child
        $html .= renderTreeNode($node['right'] ?? null, false);

        $html .= '</div>';
    } elseif ($hasChildren && $node['depth'] >= 10) {
        // Show expansion indicator for deeper levels (only after 10 levels)
        $html .= '<div class="tree-children">';
        $html .= '<div class="tree-node"><div class="tree-node-card" style="border-color: #6b7280; background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);">';
        $html .= '<p class="text-xs text-gray-500">More levels available</p>';
        $html .= '<p class="text-xs text-gray-400 mt-1">Limited for performance</p>';
        $html .= '</div></div>';
        $html .= '</div>';
    }

    $html .= '</div>';

    return $html;
}
@endphp
