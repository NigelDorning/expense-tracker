<input 
    x-data="{ value: @entangle($attributes->wire('model')) }"
    x-init="new Pikaday({ field: $el, format: 'DD/MM/YYYY' });"
    x-on:change="value = $event.target.value"
    x-bind:value="value"
    class="rounded-lg border border-gray-300 p-2 mt-1 w-full"
    type="text"
>