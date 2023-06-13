<x-template>
    <x-sidebar/>
    <x-layout>
        <x-header/>
        <x-main-content heading="Domains Add">
            <div class="py-4">
                <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Add New Domain</h2>

                    <form method="POST" action="{{route('domains.store')}}">
                        @csrf

                        <div class="grid grid-cols-1 gap-6 mt-4">
                            <div>

                                <label class="text-gray-700 dark:text-gray-200" for="name">Server</label>
                                <select id="server_id"
                                        name="server_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose Server(Unit)</option>
                                    @foreach(\App\Models\Server::all() as $server)
                                        @if($server->status=='Aktif')
                                            <option
                                                value="{{$server->id}}">{{$server->name.'('.$server->unit->name.')'}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="url">URL</label>
                                <input id="url" name="url" type="text"
                                       value="{{old('url')??''}}"
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="email">PORT</label>
                                <input id="port" name="port" type="text"
                                       value="{{old('port')??''}}"
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="application_type">Application
                                    Type</label>
                                <input id="application_type" name="application_type" type="text"
                                       value="{{old('application_type')??''}}"
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="name">Name</label>
                                <input id="name" name="name" type="text"
                                       value="{{old('name')??''}}"
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="description">Description</label>
                                <input id="description" name="description" type="text"
                                       value="{{old('description')??''}}"
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="http_status">HTTP Status</label>
                                <select id="http_status"
                                        name="http_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose HTTP Status</option>
                                    <option value="200">Aktif</option>
                                    <option value="503">Tidak Aktif</option>

                                </select>

                            </div>

                        </div>

                        <div class="flex justify-end mt-6">
                            <button
                                type="submit"
                                class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                Save
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </x-main-content>
    </x-layout>
</x-template>
