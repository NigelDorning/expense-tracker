<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SavingsGoal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SavingsGoalTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(SavingsGoal::class);

        $component->assertStatus(200);
    }
}
