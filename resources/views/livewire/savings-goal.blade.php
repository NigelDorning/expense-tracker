<x-panel
    x-data=""
    x-init="
        $sprucewire.loadStore('main', {
            year: $sprucewire.entangle('year')
        })
    "
>

    <x-slot name="title">Yearly Savings Goal For {{ $year }}</x-slot>

    @if($savingsGoal)
    <x-slot name="modalTrigger">
        <div class="flex items-center space-x-2">
            <x-jet-secondary-button wire:click="$set('showSavingsModal', true)">Update Savings</x-jet-secondary-button>
            <x-jet-button wire:click="$set('showModal', true)">Update Goal</x-jet-button>
        </div>
    </x-slot>
    
    <div class="p-5">
        <div class="flex items-center space-x-5">
            <span>£{{ $savingsGoal->current ?? 0 }}</span>
            <div class="p-1 bg-gray-200 text-white rounded-full flex-1 items-center">
                <div 
                    class="bg-gray-700 text-right rounded-full h-4 transition-all duration-500 max-w-full {{ $savingsGoal->savingsPercentage >= 100 ? 'bg-green-500 bg-opacity-50' : '' }}" 
                    style="width: {{ $savingsGoal->savingsPercentage }}%"
                >
                </div>
            </div>
            <span>£{{ $savingsGoal->target ?? 0 }}</span>
        </div>
    </div>
    @else 
        <x-jet-button wire:click="$set('showModal', true)">Set Goal</x-jet-button>
    @endif

    <!-- Target Modal -->
    <x-jet-dialog-modal wire:model="showModal">

        <x-slot name="title">Set Yearly Savings Goal</x-slot>

        <x-slot name="content">

            <x-jet-input wire:model.defer="savingsGoal.target" />

        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click="updateYearlySavingsTarget">Save</x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>

    <!-- Savings Modal -->
    <x-jet-dialog-modal wire:model="showSavingsModal">

        <x-slot name="title">Add Savings</x-slot>

        <x-slot name="content">

            <div>
                <x-input.select wire:model.defer="updateSavingsType">
                    <option value="deposit">Deposit</option>
                    <option value="withdrawal">Withdrawal</option>
                </x-input.select>
            </div>

            <div>
                <x-jet-input wire:model.defer="updateSavings" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click="updateYearlySavingsCurrent">Save</x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>

</x-panel>
