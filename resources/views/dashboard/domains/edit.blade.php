<x-layouts.dashboard>
    <div class="py-4">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Domain</h2>

            <form method="POST" action="{{route('domains.update',$domain->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div class="hidden">
                        <input id="user_id" name="user_id" value="{{auth()->user()->id}}"/>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="name">Name</label>
                        <input id="name" name="name" type="text"
                               value="{{old('name') ?? $domain->name}}"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="url">URL</label>
                        <input id="url" name="url" type="text"
                               value="{{old('url') ?? $domain->url}}"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="description">Description</label>
                        <input id="description" name="description" type="text"
                               value="{{old('description') ?? $domain->description}}"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="application_type">Application Type</label>
                        <input id="application_type" name="application_type" type="text"
                               value="{{old('application_type') ?? $domain->application_type}}"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="port">PORT</label>
                        <input id="port" name="port" type="number"
                               value="{{old('port') ?? $domain->port}}"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="name">Server</label>
                        <select id="server_id" name="server_id"
                                class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled>Choose Server (Unit)</option>
                            @foreach(\App\Models\Server::all() as $server)
                                @if($server->status == 'Active')
                                    <option value="{{$server->id}}" {{ old('server_id') == $server->id ? 'selected' : '' }}> {{$server->name.' ('.$server->unit->name.')'}} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="images">Screenshot Website View</label>
                        {{-- if there is image --}}

                        <div class=" grid grid-cols-1 sm:grid-cols-2">
                            @if (\App\Models\DomainImages::where('domain_id', $domain->id)->exists())
                                <img class="img-preview w-full h-auto mb-4" src="{{ asset('storage/'.\App\Models\DomainImages::where('domain_id', $domain->id)->first()->images) }}">
                            @else
                                <img class="img-preview w-full h-auto mb-4">
                            @endif
                        </div>
                        <input id="images" name="images" onchange="previewImage()"
                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button
                        type="submit"
                        class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                        Update
                    </button>
                </div>
            </form>
        </section>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#images');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
</x-layouts.dashboard>
