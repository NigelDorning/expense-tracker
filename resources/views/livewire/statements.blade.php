<x-panel>
    <!-- Title -->
    <x-slot name="title">{{ ucfirst($type) }}s</x-slot>

    <!-- Modal -->
    <x-slot name="modalTrigger">
        <x-jet-button wire:click="$set('showModal', true)">Add {{ ucfirst($type) }}</x-jet-button>
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
            @forelse($statements as $statement)
                <tr>
                    <x-table.cell class="w-1/4">{{ $statement->category }}</x-table.cell>
                    <x-table.cell>£{{ $statement->amount }}</x-table.cell>
                    <x-table.cell>{{ $statement->when->format('d/m/Y') }}</x-table.cell>
                    <x-table.cell>
                        @if($statement->recurring)
                            <x-icon name="refresh" class="w-5 h-5" />
                        @else 
                            <span>--</span>
                        @endif
                    </x-table.cell>
                    <x-table.cell></x-table.cell>
                </tr>
            @empty 
                <x-table.cell colspan="5" class="text-center">No {{ ucfirst($type) }}s</x-table.cell>
            @endforelse
        </x-slot>
    </x-table>

    <!-- Modal -->
    <x-jet-dialog-modal wire:model="showModal">

        <x-slot name="title">Add {{ ucfirst($type) }}</x-slot>

        <x-slot name="content">

            <div>
                <x-jet-label for="{{ $type }}-category">Category</x-jet-label>
                <x-input.select id="{{ $type }}-category" wire:model="statement.category">
                    <option value="">-- Select {{ ucfirst($type) }} Category --</option>
                    @foreach(App\Models\Statement::STATEMENT_TYPES[$type] as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </x-input.select>
                <x-jet-input-error for="{{ $type }}-category" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="{{ $type }}-amount">Amount</x-jet-label>
                <x-jet-input id="{{ $type }}-amount" wire:model="statement.amount" type="number" />
                <x-jet-input-error for="{{ $type }}-amount" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="{{ $type }}-when">When</x-jet-label>
                <x-jet-input id="{{ $type }}-when" wire:model="statement.when" type="number" />
                <x-jet-input-error for="{{ $type }}-when" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="{{ $type }}-recurring">Recurring?</x-jet-label>
                <x-jet-checkbox id="{{ $type }}-recurring" wire:model="statement.recurring" />
                <x-jet-input-error for="{{ $type }}-recurring" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click="save">Add</x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>

</x-panel>
