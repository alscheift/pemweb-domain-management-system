<x-layouts.app>
    <aside>
        <x-partials.sidebar/>
    </aside>

    <header class="sm:ml-0 md:ml-64">
        <x-partials.header/>
    </header>

    <main class=" p-4 sm:ml-0 md:ml-64">
        {{$slot}}
    </main>

    <footer>

    </footer>
</x-layouts.app>
