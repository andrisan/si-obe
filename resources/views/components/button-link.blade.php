<a {{ $attributes->merge(['class'=>"w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"]) }}>
    <span class="pr-1">
        {{ $slot }}
    </span>
</a>
