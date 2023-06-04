<x-template>
    <div class="flex h-screen">
        <div class="w-full max-w-sm p-6 m-auto mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex justify-center mx-auto">
                <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/logo.svg" alt="">
            </div>

            <form class="mt-6">
                <div>
                    <label for="username" class="block text-sm text-gray-800 dark:text-gray-200">Username</label>
                    <input type="text"
                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"/>
                </div>

                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm text-gray-800 dark:text-gray-200">Password</label>
                        <a href="#" class="text-xs text-gray-600 dark:text-gray-400 hover:underline">Forget
                            Password?</a>
                    </div>

                    <input type="password"
                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"/>
                </div>

                <div class="mt-6">
                    <button
                        class="w-full px-6 py-2.5 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                        Sign In
                    </button>
                </div>
            </form>

            <p class="mt-8 text-xs font-light text-center text-gray-400"> Don't have an account? <a href="#"
                                                                                                    class="font-medium text-gray-700 dark:text-gray-200 hover:underline">Create
                    One</a></p>
        </div>
    </div>
</x-template>


