<input 
    x-data="{ date: @entangle($attributes->wire('model')) }"
    x-init="new Pikaday({ field: $el, format: 'D/M/YYYY' });"
    x-bind:value="date"
    class="rounded-lg border border-gray-300 p-2 mt-1 w-full"
    type="text"
>