<div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow">
    <button type="button"
            class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
        <span class="sr-only">Open sidebar</span>
        <!-- Heroicon name: outline/bars-3-bottom-left -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12"/>
        </svg>
    </button>
    <div class="flex flex-1 justify-between px-4">
        <div class="flex flex-1">
        </div>
        <div class="ml-4 flex items-center md:ml-6">
            <div class="relative ml-3">
                <div>
                    <button type="button"
                            class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full border-2 border-gray-600"
                            src="https://icon-library.com/images/default-profile-icon/default-profile-icon-6.jpg"
                            alt="">
                    </button>
                </div>
                <div id="user-menu"
                    class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                    tabindex="-1">
                    <!-- Active: "bg-gray-100", Not Active: "" -->
                    <div class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300">
                        <a href="{{ route('profile') }}" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                    </div>

                    <div class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300">
                        <form action="/logout" method="POST">
                            @csrf
    
                            <button type="submit"
                                role="menuitem" tabindex="-1" id="user-menu-item-2">
                                Logout
                            </button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
