<x-layouts.dashboard>
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
                    <x-forms.input name="url">URL</x-forms.input>
                    <x-forms.input name="port">PORT</x-forms.input>
                    <x-forms.input name="application_type">Application Type</x-forms.input>
                    <x-forms.input name="name">Name</x-forms.input>
                    <x-forms.input name="description">Description</x-forms.input>

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

                <x-forms.submit/>
            </form>
        </section>
    </div>
</x-layouts.dashboard>
