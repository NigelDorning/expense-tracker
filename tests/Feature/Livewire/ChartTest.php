<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Chart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ChartTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Chart::class);

        $component->assertStatus(200);
    }
}
