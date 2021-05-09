<x-dropdown {{ $attributes }}>
    <button x-on:click="value = 10; label = 10; open = false;" x-bind:class="{ 'bg-gray-100' : value === 10 }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">10</button>
    <button x-on:click="value = 20; label = 20; open = false;" x-bind:class="{ 'bg-gray-100' : value === 20 }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">20</button>
    <button x-on:click="value = 30; label = 30; open = false;" x-bind:class="{ 'bg-gray-100' : value === 30 }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">30</button>
    <button x-on:click="value = 40; label = 40; open = false;" x-bind:class="{ 'bg-gray-100' : value === 40 }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">40</button>
    <button x-on:click="value = 50; label = 50; open = false;" x-bind:class="{ 'bg-gray-100' : value === 50 }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">50</button>
</x-dropdown>