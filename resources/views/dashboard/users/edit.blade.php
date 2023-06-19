<x-layouts.dashboard>
    <div class="py-4">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit User</h2>

            <form method="POST" action="{{route('users.update',$user->id)}}">
                @csrf
                @method('patch')

                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="name">Unit</label>
                        <select id="unit_id"
                                name="unit_id"
                                class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose Unit</option>
                            @foreach(\App\Models\Unit::all() as $unit)
                                <option
                                    value="{{$unit->id}}" {{$user->unit->id==$unit->id? 'selected':''}}>{{$unit->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="name">Name</label>
                        <input id="name" name="name" type="text"
                               value="{{old('name') ?? $user->name}}"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="username">Username</label>
                        <input id="username" name="username" type="text"
                               value="{{old('username') ?? $user->username}}"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="phone">Phone Number</label>
                        <input id="phone" name="phone" type="text"
                               value="{{old('phone') ?? $user->phone}}"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="email">Email Address</label>
                        <input id="email" name="email" type="email"
                               value="{{old('email') ?? $user->email}}"
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
