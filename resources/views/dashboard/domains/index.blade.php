<x-layouts.dashboard>
    <x-partials.form/>

    <div class="py-4 flex flex-col">
        <section class="container mx-auto">
            @if ($domains->count())
                <div class="flex flex-col">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <x-table>
                                <x-slot name="thead">
                                    <tr>
                                        <x-table.th>ID</x-table.th>
                                        <x-table.th>Name</x-table.th>
                                        <x-table.th>Description</x-table.th>
                                        <x-table.th>Url</x-table.th>
                                        <x-table.th>Application Type</x-table.th>
                                        <x-table.th>Port</x-table.th>
                                        <x-table.th>HTTP Status</x-table.th>
                                        <x-table.th>Server</x-table.th>
                                        <x-table.th>Unit</x-table.th>
                                        <th scope="col" class="relative py-3.5 px-4">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </x-slot>
                                <x-slot name="tbody">
                                    @foreach($domains as $domain)
                                        <tr>
                                            <x-table.td>{{$domain->id}}</x-table.td>
                                            <x-table.td>{{$domain->name}}</x-table.td>
                                            <x-table.td>{{$domain->description}}</x-table.td>
                                            <x-table.td>{{$domain->url}}</x-table.td>
                                            <x-table.td>{{$domain->application_type}}</x-table.td>
                                            <x-table.td>{{$domain->port}}</x-table.td>
                                            <x-table.td>{{$domain->http_status}}</x-table.td>
                                            <x-table.td>{{$domain->server->name}}</x-table.td>
                                            <x-table.td>{{$domain->server->unit->name}}</x-table.td>

                                            <x-table.actions>
                                                @can('pic')
                                                    <x-table.btn-update
                                                        route="{{route('domains.update',$domain->getRouteKey())}}/edit"/>
                                                    <x-table.btn-delete
                                                        text="{{$domain->url}}"
                                                        route="{{route('domains.destroy',$domain->getRouteKey())}}"/>
                                                @endcan
                                            </x-table.actions>
                                        </tr>
                                    @endforeach
                                </x-slot>
                            </x-table>
                        </div>
                    </div>
                </div>
            @else
                <x-partials.nofound message="No domains found..."/>
            @endif
        </section>
        <div class="grid grid-cols-2 gap-5 mt-5">
            <div class="p-4 mr-auto">
                @if ($domains->currentPage() > 1)
                    <a href="{{ $domains->previousPageUrl() }}">
                        <button class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                            Previous
                        </button>
                    </a>
                @endif

                @if ($domains->hasMorePages())
                    <a href="{{ $domains->nextPageUrl() }}">
                        <button class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                            Next
                        </button>
                    </a>
                @endif
            </div>
            @can('pic')
            <div class="p-4 ml-auto">
                <a href="{{route('domains.create')}}">
                    <button
                        class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600 ">
                        Add Domain
                    </button>
                </a>
            </div>
            @endcan
        </div>
    </div>
</x-layouts.dashboard>
