<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#3D007A] dark:bg-[#E8ECF1] border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-[#5B21B6] dark:hover:bg-white focus:bg-[#5B21B6] dark:focus:bg-white active:bg-[#2C0059] dark:active:bg-[#D3DAE3] focus:outline-none focus:ring-2 focus:ring-[#3D007A] focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
