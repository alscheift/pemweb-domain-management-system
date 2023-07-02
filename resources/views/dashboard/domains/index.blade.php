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
                                            <x-table.td>
                                                @if($domain->http_status == 'Active')
                                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100">{{ $domain->http_status }}</span>
                                                @else
                                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100">{{ $domain->http_status }}</span>
                                                @endif
                                            </x-table.td>
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
                                                <div>
                                                    <a href="{{route('domains.show',$domain->getRouteKey())}}">
                                                        <button
                                                            class="text-green-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                                            View
                                                        </button>
                                                    </a>
                                                </div>
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
            <div class="p-4 mr-auto grid grid-cols-2 gap-4">
                @if ($domains->currentPage() > 1)
                    <a href="{{ $domains->previousPageUrl() }}">
                        <button class="col-auto px-2 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                            Previous
                        </button>
                    </a>
                @endif

                @if ($domains->hasMorePages())
                    <a href="{{ $domains->nextPageUrl() }}">
                        <button class="col-auto px-2 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                            Next
                        </button>
                    </a>
                @endif
            </div>
            
            @can('pic')
            <div class="p-4 ml-auto grid grid-cols-2 gap-4">
                <div class="col-auto">
                    <a href="{{route('domains.create')}}">
                        <button
                            class="px-2 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600 ">
                            Add Domain
                        </button>
                    </a>
                </div>
                <div class="col-auto">
                    <form action="{{ route('domains.export-excel') }}" method="POST" target="__blank">
                        @csrf
                        <button type="submit"
                            class="px-2 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600 ">
                            Export to Excel
                        </button>
                    </form>
                </div>
            </div>
            @endcan

            @can('admin')
                <div class="p-4 ml-auto grid gap-4">
                    <div class="col-auto">
                        <form action="{{ route('domains.export-excel') }}" method="POST" target="__blank">
                            @csrf
                            <button type="submit"
                                class="px-2 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600 ">
                                Export to Excel
                            </button>
                        </form>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</x-layouts.dashboard>
