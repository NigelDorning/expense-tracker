<x-panel 
    x-data=""
    x-init="
        $sprucewire.loadStore('main', {
            month: $sprucewire.entangle('month'),
            year: $sprucewire.entangle('year')
        })
    "
    :hasHeader="false"
>

    <div class="p-5 h-96 text-gray-400 flex flex-col items-center justify-center space-y-2">
        @if($statements->count() === 0)
            <x-empty-illustration class="w-56 h-56" />
            <p>No {{ $type }} data</p>
        @else 
            <livewire:livewire-pie-chart key="{{ $breakdown->reactiveKey() }}" :pie-chart-model="$breakdown" />
        @endif
    </div>
</x-panel>