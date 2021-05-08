<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Statements;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class StatementsTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Statements::class);

        $component->assertStatus(200);
    }
}
