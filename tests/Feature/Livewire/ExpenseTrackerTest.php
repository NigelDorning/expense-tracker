<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Statement;
use App\Http\Livewire\ExpenseTracker;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExpenseTrackerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ExpenseTracker::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function gets_the_users_statements_for_the_current_month_when_mounted()
    {
        $user = User::factory()->create();

        $statement = Statement::factory()->create([
            'user_id' => $user->id
        ]);

        $this->actingAs($user);

        $component = Livewire::test(ExpenseTracker::class);

        $statements = Statement::whereMonth('when', now()->format('m'))->get();

        $component->assertSet('statements', $statements);
    }

    /** @test */
    public function calculates_total_income()
    {
        $user = User::factory()->create();

        $statement = Statement::factory()->count(4)->create([
            'user_id' => $user->id,
            'amount' => 500
        ]);

        $this->actingAs($user);

        $component = Livewire::test(ExpenseTracker::class);

        $statements = Statement::whereMonth('when', now()->format('m'))->whereType('income')->sum('amount');

        $component->assertSet('totalIncome', 2000);
    }

    /** @test */
    public function calculates_total_expenses()
    {
        $user = User::factory()->create();

        $statement = Statement::factory()->count(4)->create([
            'type' => 'expense',
            'user_id' => $user->id,
            'amount' => 500
        ]);

        $this->actingAs($user);

        $component = Livewire::test(ExpenseTracker::class);

        $statements = Statement::whereMonth('when', now()->format('m'))->whereType('expense')->sum('amount');

        $component->assertSet('totalExpense', 2000);
    }

    /** @test */
    public function calculates_income_expense_difference()
    {
        $user = User::factory()->create();

        $statement = Statement::factory()->count(4)->create([
            'type' => 'income',
            'user_id' => $user->id,
            'amount' => 500
        ]);

        $statement = Statement::factory()->count(2)->create([
            'type' => 'expense',
            'user_id' => $user->id,
            'amount' => 500
        ]);

        $this->actingAs($user);

        $component = Livewire::test(ExpenseTracker::class);

        $expenses = Statement::whereMonth('when', now()->format('m'))->whereType('expense')->sum('amount');

        $income = Statement::whereMonth('when', now()->format('m'))->whereType('income')->sum('amount');

        $difference = $income = $expenses;

        $component->assertSet('difference', 1000);
    }
}
