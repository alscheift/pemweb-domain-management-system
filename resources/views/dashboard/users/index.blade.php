<x-layouts.dashboard>
    <div class="py-4 flex flex-col">
        <section class="container mx-auto">
            <div class="flex flex-col">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <x-table>
                            <x-slot name="thead">
                                <tr>
                                    <x-table.th>Name</x-table.th>
                                    <x-table.th>Username</x-table.th>
                                    <x-table.th>Email</x-table.th>
                                    <x-table.th>Phone</x-table.th>
                                    <x-table.th>Unit</x-table.th>
                                    <x-table.th>
                                        <span class="sr-only">Actions</span>
                                    </x-table.th>
                                </tr>
                            </x-slot>
                            <x-slot name="tbody">
                                @foreach(\App\Models\User::all() as $user)
                                    @if($user->is_admin)
                                        @continue
                                    @endif
                                    <tr>
                                        <x-table.td>{{$user->name}}</x-table.td>
                                        <x-table.td>{{$user->username}}</x-table.td>
                                        <x-table.td>{{$user->email}}</x-table.td>
                                        <x-table.td>{{$user->phone}}</x-table.td>
                                        <x-table.td>{{$user->unit->name}}</x-table.td>
                                        <x-table.actions>
                                            <x-table.btn-update
                                                route="{{route('users.update',$user->getRouteKey())}}/edit"/>
                                            <x-table.btn-delete
                                                route="{{route('users.destroy',$user->getRouteKey())}}"/>
                                        </x-table.actions>
                                    </tr>
                                @endforeach

                            </x-slot>
                        </x-table>

                    </div>
                </div>
            </div>
        </section>
        <div class="ml-auto mt-5">
            <a href="{{route('users.create')}}">
                <button
                    class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600 ">
                    Add User
                </button>
            </a>
        </div>
    </div>
</x-layouts.dashboard>
