<x-layouts.dashboard>
    <div class="py-4">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Add New Unit</h2>

            <form method="POST" action="{{route('units.store')}}">
                @csrf

                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <x-forms.input name="name"/>
                        <x-forms.input name="description"/>
                        <x-forms.input name="higher_domain" labelName="Higher Domain"/>
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
