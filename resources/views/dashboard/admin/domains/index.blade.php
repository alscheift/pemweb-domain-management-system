<x-template>
    <x-sidebar/>
    <x-layout>
        <x-header/>
        <x-main-content heading="Domains">
            <div class="py-4 flex flex-col">
                <section class="container mx-auto">
                    <div class="flex flex-col">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div
                                    class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-800">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <div class="flex items-center gap-x-3">
                                                    <button class="flex items-center gap-x-2">ID</button>
                                                </div>
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Name
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Description
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Application Type
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Port
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                HTTP Status
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Server
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Unit
                                            </th>

                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        @foreach(\App\Models\Domain::all() as $domain)
                                            <tr>
                                                <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                                    <div class="inline-flex items-center gap-x-3">

                                                        <span>{{$domain->id}}</span>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{$domain->name}}
                                                </td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{$domain->description}}
                                                </td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{$domain->application_type}}
                                                </td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{$domain->port}}
                                                </td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{$domain->http_status}}
                                                </td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{$domain->server->name}}
                                                </td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{$domain->server->unit->name}}
                                                </td>

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
                                        </tbody>
                                    </table>
                                </div>
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
        </x-main-content>
    </x-layout>
</x-template>
