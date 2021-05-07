<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Statement;

class Chart extends Component
{
    public $type = 'income';
    public $statements;
    public $labels = [];
    public $data = [];

    protected $listeners = ['statementAdded' => 'generateData'];

    public function mount($statements, $type = 'income')
    {
        $this->fill([
            'statements' => $statements,
            'type' => $type
        ]);

        $this->labels = $this->type === 'income'
            ? Statement::INCOME_TYPES
            : Statement::EXPENSE_TYPES;

        $this->generateData();
    }

    public function generateData()
    {
        ray('hello');
        $groups = $this->statements->groupBy('category');

        collect($this->labels)->each(function ($label) use ($groups) {
            $this->data[] = $groups->has($label)
                            ? $groups->get($label)->sum('amount')
                            : 0;
        });
    }

    public function render()
    {
        return view('livewire.chart');
    }
}
