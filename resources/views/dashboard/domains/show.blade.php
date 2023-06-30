<x-layouts.dashboard>

    <div class="py-4 flex flex-col">
        <section class="container mx-auto">
            @if ($domain->count())
                <div class="flex flex-col">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <x-table>
                                <x-slot name="thead">
                                    <tr>
                                        <div class="text-center py-4 text-xl font-medium">Data Domain dengan ID {{ $domain->id }}</div>
                                    </tr>
                                </x-slot>
                                <x-slot name="tbody">
                                    <tr>
                                        <x-table.th>ID</x-table.th>
                                        <x-table.td>{{ $domain->id }}</x-table.td>
                                    </tr>
                                    <tr>
                                        <x-table.th>Name</x-table.th>
                                        <x-table.td>{{ $domain->name }}</x-table.td>
                                    </tr>
                                    <tr>
                                        <x-table.th>Description</x-table.th>
                                        <x-table.td>{{ $domain->description }}</x-table.td>
                                    </tr>
                                    <tr>
                                        <x-table.th>Url</x-table.th>
                                        <x-table.td>{{ $domain->url }}</x-table.td>
                                    </tr>
                                    <tr>
                                        <x-table.th>Screenshot Url</x-table.th>
                                        <x-table.td><img class="h-auto max-w-lg" src="{{ asset('storage/'.\App\Models\DomainImages::where('domain_id', $domain->id)->first()->images) }}"></x-table.td>
                                    </tr>
                                    <tr>
                                        <x-table.th>Application Type</x-table.th>
                                        <x-table.td>{{ $domain->application_type }}</x-table.td>
                                    </tr>
                                    <tr>
                                        <x-table.th>Port</x-table.th>
                                        <x-table.td>{{ $domain->port }}</x-table.td>
                                    </tr>
                                    <tr>
                                        <x-table.th>Http Status</x-table.th>
                                        <x-table.td>{{ $domain->http_status }}</x-table.td>
                                    </tr>
                                    <tr>
                                        <x-table.th>Server Name</x-table.th>
                                        <x-table.td>{{ \App\Models\Server::where('id', $domain->server_id)->first()->name }}</x-table.td>
                                    </tr>
                                    <tr>
                                        <x-table.th>Penanggung Jawab</x-table.th>
                                        <x-table.td>{{ \App\Models\User::where('id', $domain->user_id)->first()->name }}</x-table.td>
                                    </tr>
                                </x-slot>
                            </x-table>
                        </div>
                    </div>
                </div>
            @else
                <x-partials.nofound message="No domains found..." />
            @endif
        </section>
    </div>
</x-layouts.dashboard>
