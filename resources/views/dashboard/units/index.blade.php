<x-layouts.dashboard>
    <x-partials.form/>

    <div class="py-4 flex flex-col">
        <section class="container mx-auto">
            @if($units->count())
                <div class="flex flex-col">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <x-table>
                                <x-slot name="thead">
                                    <tr>
                                        <x-table.th>ID</x-table.th>
                                        <x-table.th>Name</x-table.th>
                                        <x-table.th>Domain</x-table.th>
                                        <x-table.th>Description</x-table.th>
                                        <x-table.th>Server Count</x-table.th>
                                        <x-table.th>PIC Count</x-table.th>
                                        <x-table.th>
                                            <span class="sr-only">Actions</span>
                                        </x-table.th>

                                    </tr>
                                </x-slot>
                                <x-slot name="tbody">
                                    @foreach($units as $unit)
                                        <tr>
                                            <x-table.td>{{$unit->id}}</x-table.td>
                                            <x-table.td>{{$unit->name}}</x-table.td>
                                            <x-table.td>{{$unit->higher_domain}}</x-table.td>
                                            <x-table.td>{{$unit->description}}</x-table.td>
                                            <x-table.td>{{$unit->servers->count()}}</x-table.td>
                                            <x-table.td>{{$unit->users->count()}}</x-table.td>

                                            <x-table.actions>
                                                <x-table.btn-update
                                                    route="{{route('units.update',$unit->getRouteKey())}}/edit"/>
                                                <x-table.btn-delete
                                                    text="{{$unit->name.'('.$unit->higher_domain.')'}}"
                                                    route="{{route('units.destroy',$unit->getRouteKey())}}"/>
                                            </x-table.actions>
                                        </tr>
                                    @endforeach
                                </x-slot>
                            </x-table>
                        </div>
                    </div>
                </div>
            @else
                <x-partials.nofound message="No units found..."/>
            @endif
        </section>
        <div class="grid grid-cols-2 gap-5 mt-5">
            <div class="p-4 mr-auto">
                @if ($units->currentPage() > 1)
                    <a href="{{ $units->previousPageUrl() }}">
                        <button class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                            Previous
                        </button>
                    </a>
                @endif

                @if ($units->hasMorePages())
                    <a href="{{ $units->nextPageUrl() }}">
                        <button class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                            Next
                        </button>
                    </a>
                @endif
            </div>
            <div class="p-4 ml-auto">
                <a href="{{route('units.create')}}">
                    <button
                        class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                        Add Unit
                    </button>
                </a>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
