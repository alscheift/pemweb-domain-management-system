<x-layouts.dashboard>
    <div class="py-4">
        <div class="flex flex-col bg-white border border-gray-200 rounded-lg shadow xl:w-full xl:h-1/2 lg:w-full">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-1 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Dashboard Page</h5>
                @can('admin')
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Admin</p>
                @endcan
                @can('pic')
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">PIC</p>
                @endcan
            </div>
            <img class="object-cover w-full rounded-t-lg h-90 md:rounded-none md:w-w" src="{{ asset('img/dashboard-image.png') }}" alt="dashboard">
            <div class="flex flex-col text-center justify-between p-4 leading-normal">
                <h5 class="mb-1 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Welcome to Domain Management System</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 items-center mt-4">
            @can('admin')
                <a href="#" class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Units</h5>
                    <span class="ml-3 text-lg font-medium text-gray-700 dark:text-gray-400">20</span>
                </a>
            @endcan
            @can('admin')
                <a href="#" class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">PIC Unit</h5>
                    <span class="ml-3 text-lg font-medium text-gray-700 dark:text-gray-400">20</span>
                </a>
            @endcan
            <a href="#" class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Server</h5>
                <span class="ml-3 text-lg font-medium text-gray-700 dark:text-gray-400">20</span>
            </a>
            <a href="#" class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Domain</h5>
                <span class="ml-3 text-lg font-medium text-gray-700 dark:text-gray-400">20</span>
            </a>
            <a href="#" class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Unresolved Issue</h5>
                <span class="ml-3 text-lg font-medium text-gray-700 dark:text-gray-400">20</span>
            </a>


        </div>
    </div>
</x-layouts.dashboard>
