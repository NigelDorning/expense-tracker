@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <header class="px-5 py-3 border-b">
        <div class="text-lg font-bold">
            {{ $title }}
        </div>
    </header>
    <div class="p-5 space-y-5">
        {{ $content }}
    </div>
    <div class="px-5 py-3 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
