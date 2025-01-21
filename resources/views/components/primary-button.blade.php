<button {{ $attributes->merge(['type' => 'submit', 'class' => 'p-2 font-semibold text-white transition rounded-lg bg-teal-400 hover:bg-teal-500']) }}>
    {{ $slot }}
</button>
