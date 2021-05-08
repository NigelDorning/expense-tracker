<?php 

namespace App\Tasks;

use App\Models\Statement;

class CreateRecurringStatements
{

    public function __invoke()
    {
        $this->createStatements();
    }

    public function createStatements()
    {
        $statements = Statement::whereDate('recurring_next', now())->get();

        $statements->each(function ($statement) {
            $newStatement = $statement->replicate()->fill([
                'when' => $statement->recurring_next->format('d/m/Y')
            ]);

            $newStatement->save();
        });
    }

}