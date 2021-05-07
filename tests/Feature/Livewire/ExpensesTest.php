<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Expenses;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ExpensesTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Expenses::class);

        $component->assertStatus(200);
    }
}
