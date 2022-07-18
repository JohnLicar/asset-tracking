@props(['event'])

@php
switch ($event) {
case 'Not Borrowed':
$class = 'bg-yellow-500';
break;
default:
$class = 'bg-gray-500';
break;
}
@endphp


<span class="rounded-full py-2 px-4 text-xs text-white whitespace-nowrap {{ $class }}">
    {{ $event }}
</span>
