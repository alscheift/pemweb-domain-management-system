@props(['route'])
<form method="POST"
      action="{{$route}}">
    @csrf
    @method('DELETE')
    <button
        class="text-blue-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none">
        Delete
    </button>
</form>
