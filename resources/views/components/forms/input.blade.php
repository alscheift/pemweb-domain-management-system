@props(['name' => 'any', 'labelName' => null, 'type' => 'text'])

<div class="mb-4">
    <label class="text-gray-700 dark:text-gray-200" for="{{$name}}">{{$slot}}</label>
    <input id="{{$name}}" name="{{$name}}" type="{{$type}}"
           value="{{old($name)??''}}"
           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
    @error($name)
    <p class="text-red-500 text-xs">{{ $message }}</p>
    @enderror
</div>
