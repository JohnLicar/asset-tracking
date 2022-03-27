<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md
    font-semibold text-xs text-red-800 uppercase tracking-widest hover:bg-red-100 active:bg-gray-900 focus:outline-none
    focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>