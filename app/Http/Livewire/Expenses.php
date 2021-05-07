<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Statement;

class Expenses extends Component
{
    public $showModal;

    public Statement $statement;

    protected $rules = [
        'statement.category' => 'required',
        'statement.amount' => 'required|integer',
        'statement.when' => 'required',
        'statement.recurring' => 'nullable',
        'statement.type' => '',
        'statement.user_id' => '',
    ];

    public function mount()
    {
        $this->statement = $this->emptyStatement();
    }

    public function save()
    {
        $this->validate();

        $this->statement->save();

        $this->clear();

        $this->emitUp('statementAdded');
    }

    public function clear()
    {
        $this->statement = $this->emptyStatement();

        $this->showModal = false;
    }

    public function emptyStatement()
    {
        return Statement::make([
            'type' => 'expense',
            'user_id' => auth()->user()->id,
            'when' => now(),
            'recurring' => false
        ]);
    }

    public function render()
    {
        return view('livewire.expenses', [
            'expenses' => Statement::whereMonth('when', now()->format('m'))->whereType('expense')->get()
        ]);
    }
}
