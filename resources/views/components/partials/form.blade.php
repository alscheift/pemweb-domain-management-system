<div x-data="{ search: '{{ request('search') }}' }" class="flex flex-1 px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
   <form class="flex w-full md:ml-0" action="{{ route(Route::currentRouteName()) }}" method="GET">
      <label for="search-field" class="sr-only">Search</label>
      <div class="relative w-full text-gray-400 focus-within:text-gray-600">
         <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
               <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
            </svg>
         </div>

         @foreach(request()->except('search') as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}"/>
         @endforeach

         <input x-ref="searchInput" type="search" class="block w-full border-transparent py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 sm:text-sm" name="search" x-model="search" placeholder="Search" />

         <button type="submit" class="absolute right-0 top-0 mt-2 mr-2">
            Search
         </button>
      </div>
   </form>
</div>
