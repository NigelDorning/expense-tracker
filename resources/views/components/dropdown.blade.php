<div
    x-data="{ open: false, value: @entangle($attributes->wire('model')) }"
    class="relative text-sm"
    x-cloak
>

    <button
        class="flex items-center space-x-4 px-3 py-2 border rounded-lg focus:outline-none bg-white"
        x-on:click="open = true"
    >
        <span x-html="value"></span>
        <x-icon name="chevron-down" class="w-4 h-4 text-gray-400" />
    </button>

    <div
        x-show.transition="open"
        x-on:click.away="open = false"
        class="absolute right-0 bg-white rounded-lg w-28 z-50 border mt-2 py-2 space-y-1"
    >
        {{ $slot }}
    </div>

</div>