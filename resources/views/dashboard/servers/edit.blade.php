<x-layouts.dashboard>
    <div class="py-4">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Server</h2>

            <form method="POST" action="{{route('servers.update',$server->id)}}">
                @csrf
                @method('patch')

                <div class="grid grid-cols-1 gap-6 mt-4">
                    <x-forms.input name="name" value="{{old('name',$server->name)}}"/>

                    <x-forms.select name="server_type" labelName="Server Type">
                        <option disabled>Choose Server Type</option>
                        <option value="Physical" {{ strtolower(old('server_type')) === 'physical' ? 'selected' : '' }}>Physical</option>
                        <option value="Virtual" {{ strtolower(old('server_type')) === 'virtual' ? 'selected' : '' }}>Virtual</option>
                    </x-forms.select>

                    <x-forms.select name="status" labelName="Status">
                        <option disabled>Choose Status</option>
                        <option value="Active" {{ strtolower(old('server_type')) === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="Non Active" {{ strtolower(old('server_type')) === 'non active' ? 'selected' : '' }}>Non Active</option>
                        <option value="Suspend" {{ strtolower(old('server_type')) === 'suspend' ? 'selected' : '' }}>Suspend</option>
                    </x-forms.select>


                    <x-forms.input name="ip_address" value="{{old('ip_address',$server->ip_address)}}" labelName="IP Address"/>
                    <x-forms.input name="processor" value="{{old('processor',$server->processor)}}"/>
                    <x-forms.input name="core_processor_count" value="{{old('core_processor_count',$server->core_processor_count)}}" labelName="Core Processor Count" type="number"/>
                    <x-forms.input name="ram" value="{{old('ram',$server->ram)}}" labelName="RAM" type="number"/>

                    {{-- <x-forms.select name="unit_id" labelName="Unit">
                        <option disabled>Choose Unit</option>
                        @foreach(\App\Models\Unit::all() as $unit)
                            <option value="{{$unit->id}}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{$unit->name}}</option>
                        @endforeach
                    </x-forms.select> --}}

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
</x-layouts.dashboard>
