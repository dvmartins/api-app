<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Person;

class PersonCountControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testPersonCount()
    {
        // Cria 5 pessoas
        Person::factory()->count(5)->create();

        $response = $this->getJson('/api/contagem-pessoas');

        $response->assertStatus(200);
        $response->assertJson(['count' => 5]);
    }
}
