@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-[#D3DAE3] dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-[#3D007A] dark:focus:border-[#7C3AED] focus:ring-[#3D007A] dark:focus:ring-[#7C3AED] rounded-md shadow-sm']) }}>
