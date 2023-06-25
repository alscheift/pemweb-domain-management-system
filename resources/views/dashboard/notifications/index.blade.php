<x-layouts.dashboard>
    <x-partials.form/>

    <div class="py-4 flex flex-col">
        <section class="container mx-auto">
            @if($notifications->count())
                <div class="flex flex-col">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <x-table>
                                <x-slot name="thead">
                                    <tr>
                                        <x-table.th>ID</x-table.th>
                                        <x-table.th>Domain ID</x-table.th>
                                        <x-table.th>Domain Name</x-table.th>
                                        <x-table.th>Status</x-table.th>
                                        <x-table.th>Description</x-table.th>
                                        <x-table.th>Progress</x-table.th>
                                        <x-table.th>Date of Notification</x-table.th>
                                        @can('admin')
                                        <x-table.th>
                                            <span class="sr-only">Actions</span>
                                        </x-table.th>
                                        @endcan
                                    </tr>
                                </x-slot>
                                <x-slot name="tbody">
                                    @foreach ($notifications as $notification)
                                        <tr>
                                            <x-table.td>{{ $notification->id }}</x-table.td>
                                            <x-table.td>{{ $notification->domain_id }}</x-table.td>
                                            <x-table.td>{{ $notification->domain_name }}</x-table.td>
                                            <x-table.td>{{ $notification->status }}</x-table.td>
                                            <x-table.td>{{ $notification->description }}</x-table.td>
                                            @if ($notications->is_done)
                                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Green</span>    
                                            @else
                                                <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Red</span>
                                            @endif

                                            <x-table.td>{{ $notification->created_at }}</x-table.td>

                                            <x-table.actions>
                                                <x-table.btn-update
                                                    route="{{ route('notifications.update', $notification->getRouteKey()) }}/edit" />
                                                <x-table.btn-delete
                                                    route="{{ route('notifications.destroy', $notification->getRouteKey()) }}" />
                                            </x-table.actions>
                                        </tr>
                                    @endforeach
                                </x-slot>
                            </x-table>
                        </div>
                    </div>
                </div>
            @else
                <x-partials.nofound message="No notifications found"/>
            @endif
        </section>
        <div class="grid grid-cols-2 gap-5 mt-5">
            <div class="p-4 mr-auto">
                @if ($notifications->currentPage() > 1)
                    <a href="{{ $notifications->previousPageUrl() }}">
                        <button
                            class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                            Previous
                        </button>
                    </a>
                @endif

                @if ($notifications->hasMorePages())
                    <a href="{{ $notifications->nextPageUrl() }}">
                        <button
                            class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                            Next
                        </button>
                    </a>
                @endif
            </div>
            @can('admin')
            <div class="p-4 ml-auto">
                <a href="{{ route('notifications.create') }}">
                    <button
                        class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                        Add Notification
                    </button>
                </a>
            </div>
            @endcan
        </div>
    </div>
</x-layouts.dashboard>