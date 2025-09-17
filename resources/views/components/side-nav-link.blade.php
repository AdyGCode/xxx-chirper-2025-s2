@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'block px-4 py-2 text-sm font-medium
                   text-gray-500 hover:text-gray-700
                   hover:bg-gray-200
                   focus:border-indigo-700
                   focus:outline-none
                   transition duration-250 ease-in-out'
                : 'block px-4 py-2 text-sm font-medium
                   text-gray-500 hover:text-gray-700 focus:text-gray-700
                   hover:bg-gray-200
                   hover:border-gray-300 focus:border-gray-300
                   focus:outline-none
                   transition duration-250 ease-in-out';
@endphp

<a
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</a>
