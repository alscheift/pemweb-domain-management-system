<x-layouts.dashboard>
    <x-partials.form />

    <div class="py-4 flex flex-col">
        <section class="container mx-auto">
            @if ($solutions->count())
                <div class="flex flex-col">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <x-table>
                                <x-slot name="thead">
                                    <tr>
                                        <x-table.th>ID</x-table.th>
                                        <x-table.th>Description</x-table.th>
                                        <x-table.th>Domain Name</x-table.th>
                                        <x-table.th>Url</x-table.th>
                                        <x-table.th>Problem</x-table.th>
                                        <x-table.th>Status</x-table.th>
                                        <x-table.th>Target Date</x-table.th>
                                        <x-table.th>Date of Solution</x-table.th>
                                        @can('pic')
                                        <th scope="col" class="relative py-3.5 px-4">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                        @endcan
                                    </tr>
                                </x-slot>
                                <x-slot name="tbody">
                                    @foreach ($solutions as $solution)
                                        <tr>
                                            <x-table.td>{{ $solution->id }}</x-table.td>
                                            <x-table.td>{{ $solution->description }}</x-table.td>
                                            <x-table.td>{{ $solution->domain_name }}</x-table.td>
                                            <x-table.td>{{ $solution->domain_url }}</x-table.td>
                                            <x-table.td>{{ $solution->notification_status }}</x-table.td>
                                            <x-table.td>
                                                @if($solution->status == 'To Do')
                                                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100">{{ $solution->status }}</span>
                                                @elseif($solution->status == 'Doing')
                                                    <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 dark:bg-yellow-700 dark:text-yellow-100">{{ $solution->status }}</span>
                                                @elseif($solution->status == 'Done')
                                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100">{{ $solution->status }}</span>
                                                @endif
                                            </x-table.td>
                                            <x-table.td>{{ $solution->target_date }}</x-table.td>
                                            @if($solution->date_of_solution)
                                                <x-table.td>{{ $solution->date_of_solution }}</x-table.td>
                                            @else
                                                <x-table.td> - </x-table.td>
                                            @endif

                                            <x-table.actions>
                                                @can('pic')
                                                    @if ($solution->notification_is_done == '0')
                                                        <form method="POST" action="{{ route('solutions.done', $solution) }}">
                                                            @csrf
                                                            
                                                            <button
                                                                class="text-green-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-green-300 hover:text-indigo-500 focus:outline-none">
                                                                Marks As Done
                                                            </button>
                                                        </form>

                                                        <x-table.btn-update
                                                            route="{{ route('solutions.update', $solution->getRouteKey()) }}/edit" />
                                                    @endif
                                                    <x-table.btn-delete text="{{ $solution->url }}"
                                                        route="{{ route('solutions.destroy', $solution->getRouteKey()) }}" />
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
                <x-partials.nofound message="No solutions found..." />
            @endif
        </section>
        <div class="grid grid-cols-2 gap-5 mt-5">
            <div class="p-4 mr-auto">
                @if ($solutions->currentPage() > 1)
                    <a href="{{ $solutions->previousPageUrl() }}">
                        <button
                            class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                            Previous
                        </button>
                    </a>
                @endif

                @if ($solutions->hasMorePages())
                    <a href="{{ $solutions->nextPageUrl() }}">
                        <button
                            class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600">
                            Next
                        </button>
                    </a>
                @endif
            </div>
            @can('pic')
                <div class="p-4 ml-auto">
                    <a href="{{ route('solutions.create') }}">
                        <button
                            class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600 ">
                            Add Solution
                        </button>
                    </a>
                </div>
            @endcan
        </div>
    </div>
</x-layouts.dashboard>
