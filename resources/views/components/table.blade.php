@props([
    'thead',
    'tbody',
])
<div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
    <table {{ $attributes->class(['min-w-full divide-y divide-gray-200 dark:divide-gray-700']) }}>
        @isset($slot)
            <div {{$thead->attributes->class(['bg-gray-50 dark:bg-gray-800'])}}>
                {{ $slot }}
            </div>
            <hr>
        @endisset
        <thead {{ $thead->attributes->class(['bg-gray-50 dark:bg-gray-800']) }}>
        {{ $thead }}
        </thead>

        <tbody {{ $tbody->attributes->class(['bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900']) }}>
        {{ $tbody }}
        </tbody>
    </table>
</div>
