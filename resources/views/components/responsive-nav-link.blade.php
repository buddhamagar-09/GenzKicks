@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#7C3AED] dark:border-[#5B21B6] text-start text-base font-medium text-[#3D007A] dark:text-[#C4B5FD] bg-[#E8ECF1] dark:bg-[#3D007A]/50 focus:outline-none focus:text-[#2C0059] dark:focus:text-[#DDD6FE] focus:bg-[#E8ECF1] dark:focus:bg-[#3D007A] focus:border-[#3D007A] dark:focus:border-[#7C3AED] transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-[#E8ECF1] dark:hover:bg-[#3D007A] hover:border-[#D3DAE3] dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-[#E8ECF1] dark:focus:bg-[#3D007A] focus:border-[#D3DAE3] dark:focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>