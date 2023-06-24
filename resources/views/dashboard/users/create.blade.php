<x-layouts.dashboard>
    <div class="py-4">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Add New User</h2>

            <form method="POST" action="{{route('users.store')}}">
                @csrf

                <div class="grid grid-cols-1 gap-6 mt-4">
                    <x-forms.select name="unit_id" labelName="Unit">
                        <option selected>Choose Unit</option>
                        @foreach(\App\Models\Unit::all() as $unit)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @endforeach
                    </x-forms.select>

                    <x-forms.input name="name"/>
                    <x-forms.input name="username"/>
                    <x-forms.input name="phone" labelName="Phone Number"/>
                    <x-forms.input name="email" labelName="Email Address"/>
                    <x-forms.input name="password"/>
                    <x-forms.input name="passwordConfirmation" labelName="Password Confirmation"/>

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
</x-layouts.dashboard>
