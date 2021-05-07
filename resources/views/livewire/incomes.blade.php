<x-panel>
    <!-- Title -->
    <x-slot name="title">Incomes</x-slot>

    <!-- Modal -->
    <x-slot name="modalTrigger">
        <x-jet-button wire:click="$set('showModal', true)">Add Income</x-jet-button>
    </x-slot>
    
    <!-- Table -->
    <x-table>
        <x-slot name="thead">
            <x-table.heading>Category</x-table.heading>
            <x-table.heading>Amount</x-table.heading>
            <x-table.heading>When</x-table.heading>
            <x-table.heading>Recurring</x-table.heading>
            <x-table.heading></x-table.heading>
        </x-slot>
        <x-slot name="tbody">
            @forelse($incomes as $income)
                <tr>
                    <x-table.cell>{{ $income->category }}</x-table.cell>
                    <x-table.cell>£{{ $income->amount }}</x-table.cell>
                    <x-table.cell>{{ $income->when }}</x-table.cell>
                    <x-table.cell>
                        @if($income->recurring)
                            <x-icon name="refresh" class="w-5 h-5" />
                        @else 
                            <span>--</span>
                        @endif
                    </x-table.cell>
                    <x-table.cell></x-table.cell>
                </tr>
            @empty 
                <x-table.cell colspan="5" class="text-center">No Incomes</x-table.cell>
            @endforelse
        </x-slot>
    </x-table>

    <!-- Modal -->
    <x-jet-dialog-modal wire:model="showModal">

        <x-slot name="title">Add Income</x-slot>

        <x-slot name="content">

            <div>
                <x-jet-label for="income-category">Category</x-jet-label>
                <x-input.select id="income-category" wire:model="statement.category">
                    <option value="">-- Select Income Category --</option>
                    @foreach(App\Models\Statement::INCOME_TYPES as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </x-input.select>
                <x-jet-input-error for="income-category" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="income-amount">Amount</x-jet-label>
                <x-jet-input id="income-amount" wire:model="statement.amount" type="number" />
                <x-jet-input-error for="income-amount" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="income-when">When</x-jet-label>
                <x-jet-input id="income-when" wire:model="statement.when" type="number" />
                <x-jet-input-error for="income-when" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="income-recurring">Recurring?</x-jet-label>
                <x-jet-checkbox id="income-recurring" wire:model="statement.recurring" />
                <x-jet-input-error for="income-recurring" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click="save">Add</x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>

</x-panel>
