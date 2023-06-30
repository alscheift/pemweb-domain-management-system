<x-layouts.dashboard>
    <div class="py-4">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Solution</h2>

            <form method="POST" action="{{ route('solutions.update', $solution) }}">
                @csrf
                @method('patch')
                
                <div class="grid grid-cols-1 gap-6 mt-4">
                    <x-forms.select name="notification_id" labelName="Domain Name">
                        <option disabled>Choose Notification</option>
                        @foreach($notifications as $notification)
                            <option value="{{ $notification->id }}" {{ old('notification_id') == $notification->id ? 'selected' : '' }}>{{$notification->domain->name}}</option>
                        @endforeach
                    </x-forms.select>

                    <x-forms.select name="status" labelName="Status">
                        <option disabled>Choose Status</option>
                        <option value="To Do" {{ strtolower(old('status')) === 'to do' ? 'selected' : '' }}>To Do</option>
                        <option value="Doing" {{ strtolower(old('status')) === 'doing' ? 'selected' : '' }}>Doing</option>
                        <option value="Done" {{ strtolower(old('status')) === 'done' ? 'selected' : '' }}>Done</option>
                    </x-forms.select>
    
                    <x-forms.input name="description" value="{{ $solution->description }}"/>
                    <x-forms.input name="target_date" labelName="Target Date" type="date" value="{{ $solution->target_date }}"/>

                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                        Update
                    </button>
                </div>
            </form>
        </section>
    </div>
</x-layouts.dashboard>
