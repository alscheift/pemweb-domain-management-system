@props(['name' => 'any', 'labelName' => null])

<div class="mb-4">
    <label class="text-gray-700 dark:text-gray-200" for="{{$name}}">{{$labelName??$name}}</label>
    <select class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            id="{{$name}}"
            name="{{$name}}"
    >
        {{$slot}}
    </select>
    @error($name)
    <p class="text-red-500 text-xs">{{ $message }}</p>
    @enderror
</div>
