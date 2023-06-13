@if(session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
    >
        <p class="z-50 fixed bg-blue-500 text-white py-2 px-4 rounded-xl top-24 left-1/2 text-l">{{session('success')}}</p>
    </div>
@endif
