<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SavingsGoal as Goal;

class SavingsGoal extends Component
{
    public $showModal = false;
    public $showSavingsModal = false;
    public $year;

    public $savingsGoal;

    public $updateSavings;
    public $updateSavingsType = 'deposit';

    protected $rules = [
        'savingsGoal.for_year' => 'required',
        'savingsGoal.target' => 'required',
        'savingsGoal.current' => 'required',
        'savingsGoal.user_id' => 'required',
    ];

    public function mount()
    {
        $this->year = now()->format('Y');

        $this->setSavingsGoal();
    }

    public function updatedYear()
    {
        $this->setSavingsGoal();
    }

    public function setSavingsGoal()
    {
        $goal = auth()
            ->user()
            ->yearlySavingsGoal()
            ->whereForYear($this->year)
            ->first();

        $this->savingsGoal = $goal
            ? $goal
            : $this->makeEmptySavingsGoal();
    }

    public function updateYearlySavingsTarget()
    {
        $this->savingsGoal->save();

        $this->showModal = false;
    }

    public function updateYearlySavingsCurrent()
    {
        $this->updateSavingsType === 'deposit'
            ? $this->savingsGoal->current += $this->updateSavings
            : $this->savingsGoal->current -= $this->updateSavings;

        $this->savingsGoal->save();

        $this->showSavingsModal = false;

        $this->updateSavings = '';
    }

    public function makeEmptySavingsGoal()
    {
        return Goal::make([
            'for_year' => $this->year,
            'user_id' => auth()->user()->id
        ]);
    }

    public function render()
    {
        return view('livewire.savings-goal');
    }
}
