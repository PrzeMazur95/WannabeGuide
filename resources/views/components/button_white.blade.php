<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex bg-white uppercase tracking-widest hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-800 rounded-md text-xs rounded shadow ease-in-out duration-150']) }}>
    {{ $slot }}
</button>