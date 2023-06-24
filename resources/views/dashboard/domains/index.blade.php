<x-layouts.dashboard>
    <div class="py-4 flex flex-col">
        <section class="container mx-auto">
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
                                @foreach(\App\Models\Domain::all() as $domain)
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

                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-6">
                                                <a href="{{route('domains.update',$domain->getRouteKey())}}/edit">
                                                    <button
                                                        class="text-gray-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                                        Update
                                                    </button>
                                                </a>

                                                <form method="POST"
                                                      action="{{route('domains.destroy',$domain->getRouteKey())}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="text-blue-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </x-slot>
                        </x-table>
                    </div>
                </div>
            </div>
        </section>
        <div class="ml-auto mt-5">
            <a href="{{route('domains.create')}}">
                <button
                    class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600 ">
                    Add Domain
                </button>
            </a>
        </div>
    </div>
</x-layouts.dashboard>
