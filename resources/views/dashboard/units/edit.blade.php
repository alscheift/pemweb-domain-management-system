<x-layouts.dashboard>
   <div class="py-4">
      <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
         <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Unit</h2>

         <form method="POST" action="{{route('units.update',$unit->id)}}">
            @csrf
            @method('patch')
            <div class="grid grid-cols-1 gap-6 mt-4">
               <div>
                  <label class="text-gray-700 dark:text-gray-200" for="name">Name</label>
                  <input id="name" name="name" type="text"
                     value="{{old('name') ?? $unit->name}}"
                     class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
               </div>
               
               <div>
                  <label class="text-gray-700 dark:text-gray-200" for="description">Description</label>
                  <input id="description" name="description" type="text"
                     value="{{old('description') ?? $unit->description}}"
                     class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
               </div>

               <div>
                  <label class="text-gray-700 dark:text-gray-200" for="higher_domain">Higher Domain</label>
                  <input id="higher_domain" name="higher_domain" type="text"
                     value="{{old('higher_domain') ?? $unit->higher_domain}}"
                     class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
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
</x-layouts.dashboard>
