<x-panel :hasHeader="false">
    <div class="p-5 h-96">
        <livewire:livewire-pie-chart key="{{ $breakdown->reactiveKey() }}" :pie-chart-model="$breakdown" />
    </div>
</x-panel>