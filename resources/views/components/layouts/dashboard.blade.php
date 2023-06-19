<x-layouts.app>
    <aside>
        <x-partials.sidebar/>
    </aside>

    <main class="sm:ml-0 md:ml-64">
        <div class="flex flex-col">
            <header>
                <x-partials.header/>
            </header>
            <div class="p-4 max-w-full sm:px-6 md:px-8">
                {{-- alert if add, update, delete unit success or failed --}}
                <div>
                    <x-flash/>
                </div>
                <!-- Konten utama -->
                {{$slot}}
                <!-- /End Konten utama -->
            </div>
        </div>
    </main>

    <footer>

    </footer>
</x-layouts.app>
