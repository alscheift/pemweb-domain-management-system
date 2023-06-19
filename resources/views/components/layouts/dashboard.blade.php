<x-layouts.app>
    <aside>
        <x-partials.sidebar/>
    </aside>

    <header class="sm:ml-0 md:ml-64">
        <x-header/>
    </header>

    <main class="sm:ml-0 md:ml-64">
        <div class="p-4">
            {{$slot}}
        </div>
    </main>

    <footer>

    </footer>
</x-layouts.app>
