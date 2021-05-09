<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Statement;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class Chart extends Component
{
    public $type = 'income';
    public $statements;
    public $firstRun = true;

    protected $listeners = ['statementUpdated' => 'getStatements'];

    public function mount($statements, $type = 'income')
    {
        $this->fill([
            'statements' => $statements,
            'type' => $type
        ]);
    }

    public function getStatements()
    {
        $this->statements = Statement::whereMonth('when', now()->format('m'))
            ->whereType($this->type)    
            ->get();
    }

    public function render()
    {
        $breakdown = $this->statements->groupBy('category')
            ->reduce(function ($chart, $data) {
                $category = $data->first()->category;
                $value = $data->sum('amount');

                return $chart->addSlice($category, $value, '#10B981');
            }, LivewireCharts::pieChartModel()
                ->setTitle(ucfirst($this->type) . ' Breakdown')
                ->setAnimated($this->firstRun)
        );

        return view('livewire.chart', [
            'breakdown' => $breakdown
        ]);
    }
}
