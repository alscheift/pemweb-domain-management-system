<x-layouts.dashboard>
    <div class="py-4">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Add New Server</h2>

            <form method="POST" action="{{route('servers.store')}}">
                @csrf

                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div>

                        <x-forms.input name="name"/>

                        <x-forms.select name="server_type" labelName="Server Type">
                            <option selected>Choose Server Type</option>
                            <option value="Physical">Physical</option>
                            <option value="Virtual">Virtual</option>
                        </x-forms.select>

                        <x-forms.select name="status" labelName="Status">
                            <option selected>Choose Status</option>
                            <option value="Active">Active</option>
                            <option value="Non Active">Non Active</option>
                            <option value="Suspend">Suspend</option>
                        </x-forms.select>


                        <x-forms.input name="ip_address" labelName="IP Address"/>
                        <x-forms.input name="processor"/>
                        <x-forms.input name="core_processor_count" labelName="Core Processor Count"/>
                        <x-forms.input name="ram" labelName="RAM"/>

                        <x-forms.select name="unit_id" labelName="Unit">
                            <option selected>Choose Unit</option>
                            @foreach(\App\Models\Unit::all() as $unit)
                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                            @endforeach
                        </x-forms.select>

                    </div>

                    <div class="flex justify-end mt-6">
                        <button
                            type="submit"
                            class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</x-layouts.dashboard>
