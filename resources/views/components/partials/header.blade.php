<div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow">
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
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
