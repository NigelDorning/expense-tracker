<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Statement;
use App\Http\Livewire\Incomes;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IncomesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $component = Livewire::test(Incomes::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function can_create_an_income()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        Livewire::test(Incomes::class)
            ->set('statement.category', 'wages')
            ->set('statement.type', 'income')
            ->set('statement.amount', 1000)
            ->set('statement.when', now())
            ->set('statement.recurring', true)
            ->call('save');

        $statement = Statement::findOrFail(1);

        $this->assertDatabaseHas('statements', [
            'id' => $statement->id
        ]);
    }
}
