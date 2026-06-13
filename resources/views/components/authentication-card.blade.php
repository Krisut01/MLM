<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-[#090c12]">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-900 shadow-md dark:shadow-black/30 overflow-hidden sm:rounded-lg border border-transparent dark:border-gray-800">
        {{ $slot }}
    </div>
</div>
