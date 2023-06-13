@props(['name'])
@if(isset($name))
    @component('components.svgs.'.$name, ['attributes'=>$attributes])@endcomponent
@endif
