<div class="max-w-6xl mx-auto py-10 space-y-5">
    
    <div class="grid grid-cols-3 gap-5">

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

    <livewire:incomes />

    <livewire:expenses />

</div>
