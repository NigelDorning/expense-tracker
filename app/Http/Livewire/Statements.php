<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Statement;

class Statements extends Component
{
    public Statement $statement;

    public $showModal = false;
    public $type = 'income';

    protected $rules = [
        'statement.category' => 'required',
        'statement.amount' => 'required|integer',
        'statement.when' => 'required',
        'statement.recurring' => 'nullable',
        'statement.type' => 'required',
        'statement.user_id' => 'required',
    ];

    public function mount($type = 'income')
    {
        $this->fill([
            'type' => $type,
            'statement' => $this->emptyStatement()
        ]);
    }

    public function edit(Statement $statement)
    {
        $this->fill([
            'showModal' => true,
            'statement' => $statement
        ]);
    }

    public function save()
    {
        $this->validate();

        $this->statement->save();

        $this->clear();

        $this->emit('statementAdded');
    }

    public function clear()
    {
        $this->fill([
            'showModal' => false,
            'statement' => $this->emptyStatement()
        ]);
    }

    public function emptyStatement()
    {
        return Statement::make([
            'type' => $this->type,
            'user_id' => auth()->user()->id,
            'when' => now(),
            'recurring' => false
        ]);
    }

    public function render()
    {
        return view('livewire.statements', [
            'statements' => Statement::whereMonth('when', now()->format('m'))
                ->whereType($this->type)
                ->get()
        ]);
    }
}
