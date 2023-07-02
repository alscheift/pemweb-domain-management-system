<x-layouts.dashboard>

    <div class="py-4 flex flex-col">
        <section class="container mx-auto">
            <div class="flex flex-col">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <x-table>
                            <x-slot name="thead">
                                <tr>
                                    <div class="text-center py-4 text-xl font-medium">User Profile</div>
                                </tr>
                            </x-slot>
                            <x-slot name="tbody">
                                <tr>
                                    <x-table.th>ID</x-table.th>
                                    <x-table.td>{{ $user->id }}</x-table.td>
                                </tr>
                                <tr>
                                    <x-table.th>Name</x-table.th>
                                    <x-table.td>{{ $user->name }}</x-table.td>
                                </tr>
                                <tr>
                                    <x-table.th>Role</x-table.th>
                                    <x-table.td>
                                        @if ($user->is_admin)
                                            Admin 
                                        @else
                                            PIC Unit {{ $user->unit->name }}
                                        @endif
                                    </x-table.td>
                                </tr>
                                <tr>
                                    <x-table.th>Email</x-table.th>
                                    <x-table.td>{{ $user->email }}</x-table.td>
                                </tr>
                                <tr>
                                    <x-table.th>Username</x-table.th>
                                    <x-table.td>{{ $user->username }}</x-table.td>
                                </tr>
                                <tr>
                                    <x-table.th>Phone Number</x-table.th>
                                    <x-table.td>{{ $user->phone }}</x-table.td>
                                </tr>
                                @if($user->unit_id != null)
                                    <tr>
                                        <x-table.th>Unit</x-table.th>
                                        <x-table.td>{{ $user->unit->name }}</x-table.td>
                                    </tr>
                                @endif
                            </x-slot>
                        </x-table>
                    </div>
                </div>
            </div>
        </section>
        <div class="grid gap-5 mt-5">
            <div class="p-4 ml-auto">
                <a href="{{ route('profile.edit', $user->id)}}">
                    <button
                        class="px-6 py-2 font-medium text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded hover:bg-blue-600 ">
                        Edit Profile
                    </button>
                </a>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
