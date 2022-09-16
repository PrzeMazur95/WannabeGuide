<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex bg-white uppercase hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 text-xs rounded shadow']) }}>
    {{ $slot }}
</button>
