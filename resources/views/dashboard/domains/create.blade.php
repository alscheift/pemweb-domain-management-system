<x-layouts.dashboard>
    <div class="py-4">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Add New Domain</h2>

            <form method="POST" action="{{route('domains.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4">
                    {{--                    <div class="hidden">--}}
                    {{--                        <input id="user_id" name="user_id" value="{{auth()->user()->id}}"/>--}}
                    {{--                    </div>--}}

                    <x-forms.select name="user_id" labelName="Penanggung Jawab">
                        <option selected>Pilih PIC Unit</option>
                        @foreach(auth()->user()->unit->users as $user)
                            <option @selected(old('user_id')==$user->id)
                                    value="{{$user->id}}">
                                {{$user->name.' ('.$user->username.')'}}
                            </option>
                        @endforeach
                    </x-forms.select>

                    <x-forms.input name="name"/>
                    <x-forms.input name="url" labelName="URL"/>
                    <x-forms.input name="description"/>
                    <x-forms.input name="application_type" labelName="Application Type"/>
                    <x-forms.input name="port" labelName="PORT" type="number"/>

                    <x-forms.select name="server_id" labelName="Server">
                        <option selected>Choose Server (Unit)</option>
                        @foreach(auth()->user()->unit->servers as $server)
                            @if($server->status == 'Active')
                                <option @selected(old('server_id')==$server->id)
                                        value="{{$server->id}}">
                                    {{$server->name.' ('.$server->unit->name.')'}}
                                </option>
                            @endif
                        @endforeach
                    </x-forms.select>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="images">Screenshot Website View</label>
                        <div class=" grid grid-cols-1 sm:grid-cols-2">
                            <img class="img-preview w-full h-auto mb-4">
                        </div>
                        <input id="images" name="images" onchange="previewImage()"
                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                               id="file_input" type="file">
                    </div>

                </div>

                <x-forms.submit/>
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
