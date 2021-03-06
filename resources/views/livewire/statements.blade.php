<x-panel
    x-data="" 
    x-init="
        $sprucewire.loadStore('main', {
            month: $sprucewire.entangle('month'),
            year: $sprucewire.entangle('year')
        })
    "
>
    <!-- Title -->
    <x-slot name="title">{{ ucfirst($type) }}s</x-slot>

    <!-- Modal -->
    <x-slot name="modalTrigger">
        <div class="inline-flex items-center space-x-2">
            <x-dropdown.view-amount wire:model="viewAmount" />
            <x-jet-button wire:click="create">Add {{ ucfirst($type) }}</x-jet-button>
        </div>
    </x-slot>
    
    <!-- Table -->
    <div class="overflow-x-auto z-10">
        <x-table>
            <x-slot name="thead">
                <x-table.heading>Category</x-table.heading>
                <x-table.heading>Note</x-table.heading>
                <x-table.heading>Amount</x-table.heading>
                <x-table.heading>When</x-table.heading>
                <x-table.heading>Recurring</x-table.heading>
                <x-table.heading></x-table.heading>
            </x-slot>
            <x-slot name="tbody">
                @forelse($statements as $statement)
                    <tr>
                        <x-table.cell class="w-1/5">{{ $statement->category }}</x-table.cell>
                        <x-table.cell class="w-1/5">{{ $statement->note ?? '--' }}</x-table.cell>
                        <x-table.cell>£{{ $statement->amount }}</x-table.cell>
                        <x-table.cell>{{ $statement->when }}</x-table.cell>
                        <x-table.cell>
                            @if($statement->recurring)
                                <x-icon name="refresh" class="w-5 h-5" />
                            @else 
                                <span>--</span>
                            @endif
                        </x-table.cell>
                        <x-table.cell>
                            <div class="flex items-center space-x-2 justify-end">
                                <x-jet-secondary-button wire:click="edit({{ $statement->id }})">Edit</x-jet-secondary-button>
                                <x-jet-danger-button wire:click="confirmStatementDeletion({{ $statement->id }})">Delete</x-jet-danger-button>
                            </div>
                        </x-table.cell>
                    </tr>
                @empty 
                    <x-table.cell colspan="5" class="text-center">No {{ ucfirst($type) }}s</x-table.cell>
                @endforelse
            </x-slot>
        </x-table>
    </div>

    <!-- Modal -->
    <x-jet-dialog-modal wire:model="showModal">

        <x-slot name="title">Add {{ ucfirst($type) }}</x-slot>

        <x-slot name="content">

            <div>
                <x-jet-label for="{{ $type }}-category">Category</x-jet-label>
                <x-input.select id="{{ $type }}-category" wire:model.defer="statement.category">
                    <option value="">-- Select {{ ucfirst($type) }} Category --</option>
                    @foreach(App\Models\Statement::STATEMENT_TYPES[$type] as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </x-input.select>
                <x-jet-input-error for="{{ $type }}-category" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="{{ $type }}-amount">Note</x-jet-label>
                <x-jet-input id="{{ $type }}-amount" wire:model.defer="statement.note" />
                <x-jet-input-error for="{{ $type }}-amount" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="{{ $type }}-amount">Amount</x-jet-label>
                <x-jet-input id="{{ $type }}-amount" wire:model.defer="statement.amount" type="number" />
                <x-jet-input-error for="{{ $type }}-amount" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="{{ $type }}-when">When</x-jet-label>
                <x-input.datepicker id="{{ $type }}-when" wire:model="statement.when" type="number" />
                <x-jet-input-error for="{{ $type }}-when" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="{{ $type }}-recurring">Recurring?</x-jet-label>
                <x-jet-checkbox id="{{ $type }}-recurring" wire:model="statement.recurring" />
                <x-jet-input-error for="{{ $type }}-recurring" class="mt-2" />
            </div>
            
            <div x-data="{ show: @entangle('statement.recurring') }" x-show.transition.opacity="show" x-cloak>
                <x-jet-label for="{{ $type }}-category">Schedule</x-jet-label>
                <x-input.select id="{{ $type }}-category" wire:model.defer="statement.recurring_schedule">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                    <option value="quarterly">Quarterly</option>
                    <option value="biannually">Biannually</option>
                    <option value="yearly">Yearly</option>
                </x-input.select>
                <x-jet-input-error for="{{ $type }}-category" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click="save">Save</x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>

    <!-- Delete Modal -->
    <x-jet-confirmation-modal wire:model="confirmingStatementDeletion">

        <x-slot name="title">Delete Statement</x-slot>

        <x-slot name="content">
            <p>Are you sure you want to delete this statement?</p>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingStatementDeletion')" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                Delete
            </x-jet-danger-button>
        </x-slot>

    </x-jet-confirmation-modal>

    @if($statements->hasPages())
        <x-slot name="footer">
            {{ $statements->links() }}
        </x-slot>
    @endif

</x-panel>
