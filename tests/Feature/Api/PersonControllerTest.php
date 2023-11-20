<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Person;
use Ramsey\Uuid\Uuid;

class PersonControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStorePerson()
    {
        $data = [
            'name' => 'John Doe',
            'nickname' => 'JD',
            'stack' => 'PHP',
            'birth' => '2000-01-01'
        ];

        $response = $this->postJson('/api/pessoas', $data);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'name',
            'nickname',
            'stack',
            'birth',
            'uuid'
        ]);
    }

    public function testShowPerson()
    {
        $person = Person::factory()->create();

        $response = $this->getJson("/api/pessoas/{$person->uuid}");

        $response->assertStatus(200);
        $response->assertJson([
            'name' => $person->name,
            'nickname' => $person->nickname,
            'stack' => $person->stack,
            'birth' => $person->birth,
            'uuid' => $person->uuid
        ]);
    }
}
