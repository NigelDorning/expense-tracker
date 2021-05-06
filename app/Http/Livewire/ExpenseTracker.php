<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Statement;

class ExpenseTracker extends Component
{
    public $statements = [];

    public function mount()
    {
        $this->statements = Statement::whereMonth('when', now()->format('m'))->get();
    }

    /**
     * Gets the total sum of the current months incomes.
     *
     * @return void
     */
    public function getTotalIncomeProperty()
    {
        return $this->statements->where('type', 'income')->pluck('amount')->sum();
    }

    /**
     * Gets the total sum of the current months expenses.
     *
     * @return void
     */
    public function getTotalExpenseProperty()
    {
        return $this->statements->where('type', 'expense')->pluck('amount')->sum();
    }

    /**
     * Gets the difference between incomes and expenses.
     *
     * @return void
     */
    public function getDifferenceProperty()
    {
        return $this->totalIncome - $this->totalExpense;
    }

    public function render()
    {
        return view('livewire.expense-tracker', );
    }
}
