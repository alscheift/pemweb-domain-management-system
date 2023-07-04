<x-layouts.dashboard>
    <div class="py-4">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Notification</h2>

            <form method="POST" action="{{route('notifications.update',$notification)}}">
                @csrf
                @method('patch')
                <div class="grid grid-cols-1 gap-6 mt-4">
                    <x-forms.select name="domain_id" labelName="Domain URL">
                        <option disabled>Choose Domain</option>
                        @foreach(\App\Models\Domain::all() as $domain)
                            <option value="{{$domain->id}}" @selected(old('domain_id', $notification->domain_id) == $domain->id)> {{ $domain->url}} </option>
                        @endforeach
                    </x-forms.select>

                    <x-forms.select name="status" labelName="Status">
                        <option disabled>Choose Status</option>
                        <option value="Hack" @selected(old('status',$notification->status) =='Hack')>Hack</option>
                        <option value="Need Maintenance" @selected(old('status',$notification->status) =='Need Maintenance')>Need Maintenance</option>
                        <option value="Content Update" @selected(old('status',$notification->status) =='Content Update')>Content Update</option>
                        <option value="Configuration Change" @selected(old('status',$notification->status) =='Configuration Change')>Configuration Change</option>
                    </x-forms.select>

                    <x-forms.input name="description" value="{{old('description',$notification->description)}}"/>
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
