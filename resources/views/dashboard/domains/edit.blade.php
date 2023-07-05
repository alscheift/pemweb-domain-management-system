<x-layouts.dashboard>
    <div class="py-4">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Domain</h2>

            <form method="POST" action="{{route('domains.update',$domain->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="grid grid-cols-1 gap-6 mt-4">
                    <x-forms.input name="name" value="{{old('name',$domain->name)}}"/>
                    <x-forms.input name="url" value="{{old('url',$domain->url)}}" labelName="URL"/>
                    <x-forms.input name="description" value="{{old('description',$domain->description)}}"/>
                    <x-forms.input name="application_type" value="{{old('application_type',$domain->application_type)}}" labelName="Application Type"/>
                    <x-forms.input name="port" value="{{old('port',$domain->port)}}" labelName="PORT" type="number"/>

                    <x-forms.select name="server_id" labelName="Server">
                        <option disabled>Choose Server (Unit)</option>
                        @foreach(\App\Models\Server::all() as $server)
                            @if($server->status == 'Active')
                                <option value="{{$server->id}}" {{ old('server_id') == $server->id ? 'selected' : '' }}> 
                                    {{$server->name.' ('.$server->unit->name.')'}} 
                                </option>
                            @endif
                        @endforeach
                    </x-forms.select>

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
