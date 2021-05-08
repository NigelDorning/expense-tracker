<div class="max-w-6xl mx-auto py-10 space-y-10">
    
    <div class="grid grid-cols-3 gap-10">

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

    <div class="grid grid-cols-2 gap-10">

        <livewire:chart :statements="$statements->where('type', 'income')" />

        <livewire:chart :statements="$statements->where('type', 'expense')" type="expense" />
    
    </div>

</div>

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
@endpush
