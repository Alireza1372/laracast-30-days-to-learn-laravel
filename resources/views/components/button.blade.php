<a
    {{ $attributes->merge([
        'class' =>
            'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0',
    ]) }}>

    {{ $slot }}
</a>
