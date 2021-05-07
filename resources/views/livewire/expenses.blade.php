<x-panel>
    <!-- Title -->
    <x-slot name="title">Expenses</x-slot>

    <!-- Modal -->
    <x-slot name="modalTrigger">
        <x-jet-button wire:click="$set('showModal', true)">Add Expense</x-jet-button>
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
            @forelse($expenses as $expense)
                <tr>
                    <x-table.cell class="w-1/4">{{ $expense->category }}</x-table.cell>
                    <x-table.cell>£{{ $expense->amount }}</x-table.cell>
                    <x-table.cell>{{ $expense->when->format('d/m/Y') }}</x-table.cell>
                    <x-table.cell>
                        @if($expense->recurring)
                            <x-icon name="refresh" class="w-5 h-5" />
                        @else 
                            <span>--</span>
                        @endif
                    </x-table.cell>
                    <x-table.cell></x-table.cell>
                </tr>
            @empty 
                <x-table.cell colspan="5" class="text-center">No Expenses</x-table.cell>
            @endforelse
        </x-slot>
    </x-table>

    <!-- Modal -->
    <x-jet-dialog-modal wire:model="showModal">

        <x-slot name="title">Add Expense</x-slot>

        <x-slot name="content">

            <div>
                <x-jet-label for="expense-category">Category</x-jet-label>
                <x-input.select id="expense-category" wire:model="statement.category">
                    <option value="">-- Select expense Category --</option>
                    @foreach(App\Models\Statement::EXPENSE_TYPES as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </x-input.select>
                <x-jet-input-error for="expense-category" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="expense-amount">Amount</x-jet-label>
                <x-jet-input id="expense-amount" wire:model="statement.amount" type="number" />
                <x-jet-input-error for="expense-amount" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="expense-when">When</x-jet-label>
                <x-jet-input id="expense-when" wire:model="statement.when" type="number" />
                <x-jet-input-error for="expense-when" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="expense-recurring">Recurring?</x-jet-label>
                <x-jet-checkbox id="expense-recurring" wire:model="statement.recurring" />
                <x-jet-input-error for="expense-recurring" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click="save">Add</x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>

</x-panel>
