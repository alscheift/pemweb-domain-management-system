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
                                    <x-table.th>Server Type</x-table.th>
                                    <x-table.th>Status</x-table.th>
                                    <x-table.th>IP Address</x-table.th>
                                    <x-table.th>Processor</x-table.th>
                                    <x-table.th>Core Processor Count</x-table.th>
                                    <x-table.th>RAM</x-table.th>
                                    <x-table.th>Domain Count</x-table.th>
                                    <x-table.th>Unit</x-table.th>
                                    <x-table.th>
                                        <span class="sr-only">Actions</span>
                                    </x-table.th>
                                </tr>
                            </x-slot>
                            <x-slot name="tbody">
                                @foreach(\App\Models\Server::all() as $server)
                                    <tr>
                                        <x-table.td>{{$server->id}}</x-table.td>
                                        <x-table.td>{{$server->name}}</x-table.td>
                                        <x-table.td>{{$server->server_type}}</x-table.td>
                                        <x-table.td>{{$server->status}}</x-table.td>
                                        <x-table.td>{{$server->ip_address}}</x-table.td>
                                        <x-table.td>{{$server->processor}}</x-table.td>
                                        <x-table.td>{{$server->core_processor_count}}</x-table.td>
                                        <x-table.td>{{$server->ram}}</x-table.td>
                                        <x-table.td>{{$server->domains->count()}}</x-table.td>
                                        <x-table.td>{{$server->unit->name}}</x-table.td>

                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-6">
                                                <button
                                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                                    Update
                                                </button>

                                                <button
                                                    class="text-blue-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none">
                                                    Delete
                                                </button>
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
        <div class="mt-5 ml-auto">
            <a href="#">
                <button
                    class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600 ">
                    Add Server
                </button>
            </a>
        </div>
    </div>
</x-layouts.dashboard>
