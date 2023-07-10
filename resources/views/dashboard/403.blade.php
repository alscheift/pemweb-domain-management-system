<x-layouts.dashboard>
    <section class="ms-auto bg-white dark:bg-gray-900 ">
        <div class="container flex items-center min-h-screen px-6 py-12 mx-auto">
            <div class="flex flex-col items-center max-w-sm mx-auto text-center">
                <p class="p-3 text-sm font-medium text-red-500 rounded-full bg-blue-50 dark:bg-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                    </svg>
                </p>
                <h1 class="mt-3 text-2xl font-semibold text-gray-800 dark:text-white md:text-3xl">You are unauthorized</h1>
                <p class="mt-4 text-gray-500 dark:text-gray-400">You are not authorized to access this specific page</p>
                <div class="mt-6">
                    <a href="{{ route('dashboard') }}">
                        <div class="px-4 py-2 text-sm font-medium tracking-wide  transition-colors duration-200 transform text-white bg-blue-500 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">Back to dashboard</div>
                    </a>
                </div>
            </div>
    </section>
</x-layouts.dashboard>
