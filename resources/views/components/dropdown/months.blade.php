<x-dropdown {{ $attributes }}>
    <button x-on:click="value = 'January'; open = false" x-bind:class="{ 'bg-gray-100' : value === 'January' }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">January</button>
    <button x-on:click="value = 'February'; open = false" x-bind:class="{ 'bg-gray-100' : value === 'February' }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">February</button>
    <button x-on:click="value = 'March'; open = false" x-bind:class="{ 'bg-gray-100' : value === 'March' }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">March</button>
    <button x-on:click="value = 'April'; open = false" x-bind:class="{ 'bg-gray-100' : value === 'April' }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">April</button>
    <button x-on:click="value = 'May'; open = false" x-bind:class="{ 'bg-gray-100' : value === 'May' }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">May</button>
    <button x-on:click="value = 'June'; open = false" x-bind:class="{ 'bg-gray-100' : value === 'June' }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">June</button>
    <button x-on:click="value = 'July'; open = false" x-bind:class="{ 'bg-gray-100' : value === 'July' }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">July</button>
    <button x-on:click="value = 'August'; open = false" x-bind:class="{ 'bg-gray-100' : value === 'August' }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">August</button>
    <button x-on:click="value = 'September'; open = false" x-bind:class="{ 'bg-gray-100' : value === 'September' }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">September</button>
    <button x-on:click="value = 'October'; open = false" x-bind:class="{ 'bg-gray-100' : value === 'October' }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">October</button>
    <button x-on:click="value = 'November'; open = false" x-bind:class="{ 'bg-gray-100' : value === 'November' }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">November</button>
    <button x-on:click="value = 'December'; open = false" x-bind:class="{ 'bg-gray-100' : value === 'December' }" class="p-2 block w-full hover:bg-gray-100 focus:outline-none">December</button>
</x-dropdown>