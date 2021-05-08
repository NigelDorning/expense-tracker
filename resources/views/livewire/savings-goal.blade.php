<x-panel>

    <x-slot name="title">Yearly Savings Goal</x-slot>

     <!-- Modal -->
    <x-slot name="modalTrigger">
        <div class="flex items-center space-x-2">
            <x-jet-secondary-button wire:click="$set('showSavingsModal', true)">Update Savings</x-jet-secondary-button>
            <x-jet-button wire:click="$set('showModal', true)">Update Goal</x-jet-button>
        </div>
    </x-slot>
    
    <div class="p-5">
        <div class="flex items-center space-x-5">
            <span>£{{ auth()->user()->yearly_savings_current }}</span>
            <div class="p-1 bg-gray-200 text-white rounded-full flex-1 items-center">
                <div 
                    class="bg-gray-700 text-right rounded-full h-4 transition-all duration-500 max-w-full {{ auth()->user()->savingsPercentage >= 100 ? 'bg-green-500 bg-opacity-50' : '' }}" 
                    style="width: {{ auth()->user()->savingsPercentage }}%"
                >
                </div>
            </div>
            <span>${{ auth()->user()->yearly_savings_target }}</span>
        </div>
    </div>

    <!-- Target Modal -->
    <x-jet-dialog-modal wire:model="showModal">

        <x-slot name="title">Set Yearly Savings Goal</x-slot>

        <x-slot name="content">

            <x-jet-input wire:model="target" />

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
                <x-input.select wire:model="savingsType">
                    <option value="deposit">Deposit</option>
                    <option value="withdrawal">Withdrawal</option>
                </x-input.select>
            </div>

            <div>
                <x-jet-input wire:model="savings" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click="updateYearlySavingsCurrent">Save</x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>

</x-panel>
