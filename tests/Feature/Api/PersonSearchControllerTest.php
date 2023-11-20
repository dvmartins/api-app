<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Person;

class PersonSearchControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testPersonSearch()
    {
        // Cria 3 pessoas
        $person1 = Person::factory()->create(['name' => 'John Doe', 'nickname' => 'JD', 'stack' => 'PHP']);
        $person2 = Person::factory()->create(['name' => 'Jane Doe', 'nickname' => 'JD', 'stack' => 'PHP']);
        $person3 = Person::factory()->create(['name' => 'Johnny Doe', 'nickname' => 'JD', 'stack' => 'PHP']);

        $response = $this->getJson('/api/pessoas?t=John');

        $response->assertStatus(200);
        $response->assertJsonCount(2); // Esperamos encontrar 2 pessoas com 'John' no nome
        $response->assertJsonFragment(['name' => $person1->name, 'nickname' => $person1->nickname, 'stack' => $person1->stack]);
        $response->assertJsonFragment(['name' => $person3->name, 'nickname' => $person3->nickname, 'stack' => $person3->stack]);
    }
}
