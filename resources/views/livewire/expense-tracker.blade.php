<div
    x-data 
    x-init="
        $sprucewire.registerStore('main', {
            month: $sprucewire.entangle('month'),
            year: $sprucewire.entangle('year')
        })
    "
    class="max-w-6xl mx-auto py-5 md:py-10 space-y-5 md:space-y-10"
>

    <div class="flex items-center justify-end space-x-2">
        <x-dropdown.months wire:model="month" />
        <div class="w-28">
            <x-jet-input type="number" wire:model="year" class="text-sm" min="1900" max="{{ $year }}" />
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-10">

        <x-panel>
            <x-slot name="title">Total Income</x-slot>
            <div class="p-5">
                <p class="text-2xl">£{{ $this->totalIncome }}</p>
            </div>
        </x-panel>

        <x-panel>
            <x-slot name="title">Total Expense</x-slot>
            <div class="p-5">
                <p class="text-2xl">£{{ $this->totalExpense }}</p>
            </div>
        </x-panel>

        <x-panel>
            <x-slot name="title">Remaining</x-slot>
            <div class="p-5">
                <p class="text-2xl">£{{ $this->difference }}</p>
            </div>
        </x-panel>
    
    </div>

    <livewire:savings-goal />

    <livewire:statements />

    <livewire:statements type="expense" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10">

        <livewire:chart :statements="$statements->where('type', 'income')" />

        <livewire:chart :statements="$statements->where('type', 'expense')" type="expense" />
    
    </div>

</div>

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/spruce@2.x.x/dist/spruce.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@joshhanley/sprucewire@0.x.x/dist/sprucewire.umd.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
@endpush
