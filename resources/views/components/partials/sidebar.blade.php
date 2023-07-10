<!-- Static sidebar for desktop -->
@php
    function isActive($path)
    {
        $all = "group flex items-center px-2 py-2 text-sm font-medium rounded-md";
        if(request()->route()->named($path)){
            return "bg-gray-900 text-white"." ".$all;

        }else {
            return "text-gray-300 hover:bg-gray-700 hover:text-white"." ".$all;
        }
    }
@endphp

<div id="default-sidebar" class="sm:fixed md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex min-h-0 flex-1 flex-col bg-gray-800">
        <div class="flex h-16 flex-shrink-0 items-center bg-gray-900 px-4">
            <img class="h-6 w-auto" src="img/logo-white.png" alt="Logo">
        </div>
        <div class="flex flex-1 flex-col overflow-y-auto">
            <nav class="flex-1 space-y-1 px-2 py-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="{{route('dashboard')}}" class="{{isActive('dashboard')}}">
                    <!--
                      Heroicon name: outline/home

                      Current: "text-gray-300", Default: "text-gray-400 group-hover:text-gray-300"
                    -->
                    <div class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                        <x-svg name="home"/>
                    </div>

                    Dashboard
                </a>

                {{-- if admin  --}}
                @can('admin')
                    <a href="{{route('users')}}" class="{{isActive('users')}}">
                        <div class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                            <x-svg name="users"/>
                        </div>
                        Users
                    </a>

                    <a href="{{route('units')}}" class="{{isActive('units')}}">
                        <div class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                            <x-svg name="units"/>
                        </div>
                        Units
                    </a>
                @endcan

                <a href="{{route('servers')}}" class="{{isActive('servers')}}">
                    <div class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                        <x-svg name="servers"/>
                    </div>

                    Server
                </a>

                <a href="{{route('domains')}}" class="{{isActive('domains')}}">
                    <div class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                        <x-svg name="domains"/>
                    </div>
                    Domains
                </a>

                <a href="{{route('notifications')}}" class="{{isActive('notifications')}}">
                    <div class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                        <x-svg name="notifications"/>
                    </div>
                    Notifications
                </a>

                <a href="{{route('solutions')}}" class="{{isActive('solutions')}}">
                    <div class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                        <x-svg name="solutions"/>
                    </div>
                    Completion Target
                </a>

                <a href="{{route('reports')}}" class="{{isActive('reports')}}">
                    <div class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                        <x-svg name="reports"/>
                    </div>
                    Reports
                </a>
            </nav>

            <div class="flex-2 mx-5">
                <h1 class="text-white">Hello, {{auth()->user()->name}}</h1>
                <h1 class="text-white">Role: {{auth()->user()->is_admin?"Admin":"PIC"}}</h1>
                <form class="my-5" action="/logout" method="POST">
                    @csrf

                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 rounded px-5 py-2 mt-10 text-white ">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
