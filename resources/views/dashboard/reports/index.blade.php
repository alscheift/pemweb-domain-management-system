<x-layouts.dashboard>

    <div class="py-4 flex flex-col">
        <section class="container mx-auto">
            @can('admin')
            <div class="flex flex-col">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <x-table>
                            <x-slot name="thead">
                                <tr>
                                    <div class="text-center py-4 text-xl font-medium bg-gray-200">All Domain Status</div>
                                </tr>
                            </x-slot>
                            <x-slot name="tbody">
                                <tr>
                                    <x-table.th>Active Domain</x-table.th>
                                    <x-table.td>{{ \App\Models\Domain::where('http_status', 'Active')->count() }}</x-table.td>
                                </tr>
                                <tr>
                                    <x-table.th>No Active Domain</x-table.th>
                                    <x-table.td>{{ \App\Models\Domain::where('http_status', 'No Active')->count() }}</x-table.td>
                                </tr>
                            </x-slot>
                        </x-table>
                    </div>
                </div>
            </div>
            @foreach ($units as $unit)
                <div class="flex flex-col my-4">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <x-table>
                                <x-slot name="thead">
                                    <tr>
                                        <div class="text-center py-4 text-xl font-medium bg-gray-200">Domain Status from Unit {{ $unit->name }}</div>
                                    </tr>
                                </x-slot>
                                <x-slot name="tbody">
                                    <tr>
                                        <x-table.th>Active Domain</x-table.th>
                                        <x-table.td>{{ \App\Models\Domain::where('http_status', 'Active')
                                            ->whereHas('server', function ($query) use ($unit) {
                                                $query->where('unit_id', $unit->id);
                                            })->count() }}
                                        </x-table.td>
                                    </tr>
                                    <tr>
                                        <x-table.th>No Active Domain</x-table.th>
                                        <x-table.td>{{ \App\Models\Domain::where('http_status', 'No Active')
                                            ->whereHas('server', function ($query) use ($unit) {
                                                $query->where('unit_id', $unit->id);
                                            })->count() }}
                                        </x-table.td>
                                    </tr>
                                </x-slot>
                            </x-table>
                        </div>
                    </div>
                </div>
            @endforeach
            @endcan
            @can('pic')
            <div class="flex flex-col">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <x-table>
                            <x-slot name="thead">
                                <tr>
                                    <div class="text-center py-4 text-xl font-medium bg-gray-200">Domain Status for Unit {{ $units->name }}</div>
                                </tr>
                            </x-slot>
                            <x-slot name="tbody">
                                <tr>
                                    <x-table.th>Active Domain</x-table.th>
                                    <x-table.td>{{ \App\Models\Domain::where('http_status', 'Active')
                                        ->whereHas('server', function ($query) use ($units) {
                                            $query->where('unit_id', $units->id);
                                        })->count() }}
                                    </x-table.td>
                                </tr>
                                <tr>
                                    <x-table.th>No Active Domain</x-table.th>
                                    <x-table.td>{{ \App\Models\Domain::where('http_status', 'No Active')
                                        ->whereHas('server', function ($query) use ($units) {
                                            $query->where('unit_id', $units->id);
                                        })->count() }}
                                    </x-table.td>
                                </tr>
                            </x-slot>
                        </x-table>
                    </div>
                </div>
            </div>
            @endcan
        </section>
    </div>
</x-layouts.dashboard>
