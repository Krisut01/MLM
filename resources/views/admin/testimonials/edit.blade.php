<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Testimonial
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data" class="bg-white rounded-2xl shadow p-6 space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input name="name" value="{{ old('name', $testimonial->name) }}" class="w-full rounded-lg border-gray-300" />
                    @error('name') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title / Location (optional)</label>
                    <input name="title" value="{{ old('title', $testimonial->title) }}" class="w-full rounded-lg border-gray-300" />
                    @error('title') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Quote</label>
                    <textarea name="quote" rows="4" class="w-full rounded-lg border-gray-300">{{ old('quote', $testimonial->quote) }}</textarea>
                    @error('quote') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" class="w-full rounded-lg border-gray-300" />
                        @error('sort_order') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="flex items-center mt-7">
                        <input id="is_active" type="checkbox" name="is_active" value="1" class="rounded border-gray-300" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
                        <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Image (optional)</label>
                        <input type="file" name="image" class="w-full text-sm" />
                        @if($testimonial->image_path)
                            <div class="mt-2 text-xs text-gray-500">Current: <a class="underline" href="{{ asset('storage/'.$testimonial->image_path) }}" target="_blank">view</a></div>
                        @endif
                        @error('image') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2">
                    <a href="{{ route('admin.testimonials') }}" class="text-sm text-gray-600 underline">Back</a>
                    <button class="px-6 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

