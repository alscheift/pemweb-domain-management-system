<x-layouts.dashboard>
   <div class="py-4">
      <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
         <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Add New Notification</h2>

         <form method="POST" action="{{ route('notifications.store') }}">
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4">
               <div>
                  <x-forms.select name="domain_id" labelName="Domain URL">
                     <option selected>Choose Domain</option>
                     @foreach(\App\Models\Domain::all() as $domain)
                        <option value="{{$domain->id}}" {{ old('domain_id') === $domain->id ? 'selected' : '' }} >{{$domain->url}}</option>
                     @endforeach
                  </x-forms.select>

                  <x-forms.select name="status" labelName="Status">
                     <option selected>Choose Status</option>
                     <option value="Hack" {{ strtolower(old('status')) === 'hack' ? 'selected' : '' }}>Hack</option>
                     <option value="Need Maintenance" {{ strtolower(old('status')) === 'need maintenance' ? 'selected' : '' }}>Need Maintenance</option>
                     <option value="Content Update" {{ strtolower(old('status')) === 'content update' ? 'selected' : '' }}>Content Update</option>
                     <option value="Configuration Change" {{ strtolower(old('status')) === 'configuration change' ? 'selected' : '' }}>Configuration Change</option>
                  </x-forms.select>
                  
                  <x-forms.input name="description" value="{{ old('description') }}"/>
               </div>

               <x-forms.submit/>

            </div>
         </form>
      </section>
   </div>
</x-layouts.dashboard>
