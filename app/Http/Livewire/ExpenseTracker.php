<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Statement;

class ExpenseTracker extends Component
{
    public $statements = [];
    public $month;
    public $year;

    protected $listeners = ['statementUpdated' => 'getStatements'];

    public function mount()
    {
        $date = now();

        $this->fill([
            'month' => $date->format('F'),
            'year' => $date->format('Y')
        ]);

        $this->getStatements();
    }

    public function updatedMonth($value)
    {
        $this->getStatements();
    }

    public function getStatements()
    {
        $month = Carbon::parse($this->month)->format('m');

        $this->statements = Statement::whereMonth('when', $month)
            ->whereYear('when', $this->year)
            ->latest()
            ->get();
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
        return view('livewire.expense-tracker');
    }
}
