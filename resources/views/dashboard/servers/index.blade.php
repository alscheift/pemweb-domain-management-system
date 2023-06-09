<x-layouts.dashboard>
    <x-partials.form/>

    <div class="py-4 flex flex-col">
        <section class="container mx-auto">
            @if($servers->count())
                <div class="flex flex-col">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <x-table>
                                <x-slot name="thead">
                                    <tr>
                                        <x-table.th>ID</x-table.th>
                                        <x-table.th>Name</x-table.th>
                                        <x-table.th>Server Type</x-table.th>
                                        <x-table.th>Status</x-table.th>
                                        <x-table.th>IP Address</x-table.th>
                                        <x-table.th>Processor</x-table.th>
                                        <x-table.th>Core Processor Count</x-table.th>
                                        <x-table.th>RAM</x-table.th>
                                        <x-table.th>Domain Count</x-table.th>
                                        <x-table.th>Unit</x-table.th>
                                        @can('pic')
                                            <x-table.th>
                                                <span class="sr-only">Actions</span>
                                            </x-table.th>
                                        @endcan
                                    </tr>
                                </x-slot>
                                <x-slot name="tbody">
                                    @foreach($servers as $server)
                                        <tr>
                                            <x-table.td>{{$server->id}}</x-table.td>
                                            <x-table.td>{{$server->name}}</x-table.td>
                                            <x-table.td>{{$server->server_type}}</x-table.td>
                                            <x-table.td>
                                                @if($server->status == 'Active')
                                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100">{{ $server->status }}</span>
                                                @else
                                                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100">{{ $server->status }}</span>
                                                @endif
                                            </x-table.td>
                                            <x-table.td>{{$server->ip_address}}</x-table.td>
                                            <x-table.td>{{$server->processor}}</x-table.td>
                                            <x-table.td>{{$server->core_processor_count}}</x-table.td>
                                            <x-table.td>{{$server->ram}} GB</x-table.td>
                                            <x-table.td>{{$server->domains->count()}}</x-table.td>
                                            <x-table.td>{{$server->unit->name}}</x-table.td>
                                            @can('pic')
                                                <x-table.actions>
                                                    <x-table.btn-update
                                                        route="{{route('servers.update',$server->getRouteKey())}}/edit"/>
                                                    <x-table.btn-delete
                                                        text="{{$server->name}}"
                                                        route="{{route('servers.destroy',$server->getRouteKey())}}"/>
                                                </x-table.actions>
                                            @endcan
                                        </tr>
                                    @endforeach
                                </x-slot>
                            </x-table>
                        </div>
                    </div>
                </div>
            @else
                <x-partials.nofound message="No servers found..."/>
            @endif
        </section>

        <div class="grid grid-cols-2 gap-5 mt-5">
            <div class="p-4 mr-auto">
                @if ($servers->currentPage() > 1)
                    <a href="{{ $servers->previousPageUrl() }}">
                        <button class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                            Previous
                        </button>
                    </a>
                @endif

                @if ($servers->hasMorePages())
                    <a href="{{ $servers->nextPageUrl() }}">
                        <button class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                            Next
                        </button>
                    </a>
                @endif
            </div>
            @can('pic')
                <div class="p-4 ml-auto">
                    <a href="{{route('servers.create')}}">
                        <button
                            class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600 ">
                            Add Server
                        </button>
                    </a>
                </div>
            @endcan
        </div>
    </div>
</x-layouts.dashboard>
