<div
    x-data="{ open: false, value: @entangle($attributes->wire('model')) }"
    class="relative text-sm"
    x-cloak
>

    <button
        class="flex items-center space-x-4 px-3 py-2 border rounded-lg focus:outline-none"
        x-on:click="open = true"
    >
        <span x-html="value"></span>
        <x-icon name="chevron-down" class="w-4 h-4 text-gray-400" />
    </button>

    <div
        x-show.transition="open"
        x-on:click.away="open = false"
        class="absolute right-0 bg-white rounded-lg w-24 z-50 border mt-2 py-2 space-y-1"
    >
        <button x-on:click="value = 10; open = false" x-bind:class="{ 'bg-gray-100' : value === 10 }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">10</button>
        <button x-on:click="value = 20; open = false" x-bind:class="{ 'bg-gray-100' : value === 20 }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">20</button>
        <button x-on:click="value = 30; open = false" x-bind:class="{ 'bg-gray-100' : value === 30 }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">30</button>
        <button x-on:click="value = 40; open = false" x-bind:class="{ 'bg-gray-100' : value === 40 }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">40</button>
        <button x-on:click="value = 50; open = false" x-bind:class="{ 'bg-gray-100' : value === 50 }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">50</button>
    </div>

</div>