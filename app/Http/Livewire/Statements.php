<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Statement;
use Livewire\WithPagination;

class Statements extends Component
{
    use WithPagination;

    public Statement $statement;

    public $showModal = false;
    public $confirmingStatementDeletion = false;
    public $type = 'income';
    public $viewAmount = 10;
    public $month;
    public $year;

    protected $rules = [
        'statement.category' => 'required',
        'statement.note' => 'nullable|max:200',
        'statement.amount' => 'required|numeric',
        'statement.when' => 'required',
        'statement.recurring' => 'nullable',
        'statement.recurring_schedule' => 'nullable',
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

    public function create()
    {
        $this->fill([
            'showModal' => true,
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

        $this->emit('statementUpdated');
    }

    public function confirmStatementDeletion(Statement $statement)
    {
        $this->fill([
            'confirmingStatementDeletion' => true,
            'statement' => $statement
        ]);
    }

    public function delete()
    {
        $this->statement->delete();

        $this->clear();

        $this->emit('statementUpdated');
    }

    public function clear()
    {
        $this->fill([
            'showModal' => false,
            'confirmingStatementDeletion' => false,
            'statement' => $this->emptyStatement()
        ]);
    }

    public function emptyStatement()
    {
        return Statement::make([
            'type' => $this->type,
            'user_id' => auth()->user()->id,
            'when' => now()->format('d/m/Y')
        ]);
    }

    public function render()
    {
        $month = Carbon::parse($this->month)->format('m');

        return view('livewire.statements', [
            'statements' => Statement::whereMonth('when', $month)
                ->whereYear('when', $this->year)
                ->whereType($this->type)
                ->latest()
                ->paginate($this->viewAmount)
        ]);
    }
}
