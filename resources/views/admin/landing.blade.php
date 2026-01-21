<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Landing Page CMS
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.landing.update') }}" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 space-y-6">
                @csrf

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Hero</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hero Title</label>
                            <input name="hero_title" value="{{ old('hero_title', $settings->hero_title) }}" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
                            @error('hero_title') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hero Image</label>
                            <input type="file" name="hero_image" class="w-full text-sm" />
                            @if($settings->hero_image_path)
                                <div class="mt-2 text-xs text-gray-500">Current: <a class="underline" href="{{ asset('storage/'.$settings->hero_image_path) }}" target="_blank">view</a></div>
                            @endif
                            @error('hero_image') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hero Subtitle</label>
                        <textarea name="hero_subtitle" rows="3" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">{{ old('hero_subtitle', $settings->hero_subtitle) }}</textarea>
                        @error('hero_subtitle') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">RWA Section</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">RWA Title</label>
                            <input name="rwa_title" value="{{ old('rwa_title', $settings->rwa_title) }}" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
                            @error('rwa_title') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">RWA Image</label>
                            <input type="file" name="rwa_image" class="w-full text-sm" />
                            @if($settings->rwa_image_path)
                                <div class="mt-2 text-xs text-gray-500">Current: <a class="underline" href="{{ asset('storage/'.$settings->rwa_image_path) }}" target="_blank">view</a></div>
                            @endif
                            @error('rwa_image') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">RWA Body</label>
                        <textarea name="rwa_body" rows="6" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">{{ old('rwa_body', $settings->rwa_body) }}</textarea>
                        @error('rwa_body') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">CTA</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">CTA Text</label>
                            <input name="cta_text" value="{{ old('cta_text', $settings->cta_text) }}" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
                            @error('cta_text') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">CTA Link</label>
                            <input name="cta_link" value="{{ old('cta_link', $settings->cta_link) }}" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
                            @error('cta_link') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('landing') }}" class="text-sm text-gray-600 dark:text-gray-300 underline">Preview landing page</a>
                    <button class="px-6 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

