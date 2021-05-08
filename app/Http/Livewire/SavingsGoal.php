<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SavingsGoal as Goal;

class SavingsGoal extends Component
{
    public $showModal = false;
    public $showSavingsModal = false;
    public $target;
    public $savings;
    public $savingsType = 'deposit';

    public function mount()
    {
        $this->setTarget();
    }

    public function setTarget()
    {
        $this->target = auth()->user()->yearly_savings_target;
    }

    public function updateYearlySavingsTarget()
    {
        auth()->user()->yearly_savings_target = $this->target;

        auth()->user()->save();

        $this->showModal = false;
    }

    public function updateYearlySavingsCurrent()
    {
        $this->savingsType === 'deposit'
            ? auth()->user()->yearly_savings_current += $this->savings
            : auth()->user()->yearly_savings_current -= $this->savings;

        auth()->user()->save();

        $this->showSavingsModal = false;

        $this->savings = 0;
    }


    public function render()
    {
        return view('livewire.savings-goal');
    }
}
