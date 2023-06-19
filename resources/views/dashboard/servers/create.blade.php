<x-layouts.dashboard>
   <div class="py-4">
      <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
         <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Add New Server</h2>

         <form method="POST" action="{{route('servers.store')}}">
            @csrf

            <div class="grid grid-cols-1 gap-6 mt-4">
               <div>
                  <div>
                     <label class="text-gray-700 dark:text-gray-200" for="name">Name</label>
                     <input id="name" name="name" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                  </div>
                  
                  <div>
                     <label class="text-gray-700 dark:text-gray-200" for="server_type">Server Type</label>
                     <select id="server_type" name="server_type" class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose Server Type </option>
                        <option value="Physical">Physical</option>
                        <option value="Virtual">Virtual</option>
                     </select>
                  </div>

                  <div>
                     <label class="text-gray-700 dark:text-gray-200" for="status">Status</label>
                     <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose Status</option>
                           <option value="Active">Active</option>
                           <option value="Non Active">Non Active</option>
                           <option value="Suspend">Suspend</option>
                     </select>
                  </div>

                  <div>
                     <label class="text-gray-700 dark:text-gray-200" for="ip_address">IP address</label>
                     <input id="ip_address" name="ip_address" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                  </div>

                  <div>
                     <label class="text-gray-700 dark:text-gray-200" for="processor">Processor</label>
                     <input id="processor" name="processor" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                  </div>

                  <div>
                     <label class="text-gray-700 dark:text-gray-200" for="core_processor_count">Core Processor Count</label>
                     <input id="core_processor_count" name="core_processor_count" type="number" min="1"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                  </div>

                  <div>
                     <label class="text-gray-700 dark:text-gray-200" for="ram">RAM</label>
                     <input id="ram" name="ram" type="number" min="1"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                  </div>

                  <div>
                     <label class="text-gray-700 dark:text-gray-200" for="unit_id">Unit</label>
                     <select id="unit_id" name="unit_id" class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose Unit</option>
                        @foreach(\App\Models\Unit::all() as $unit)
                           <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  
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
