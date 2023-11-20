<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PersonService;
use App\Http\Requests\Api\StorePersonRequest;
use App\Http\Resources\Api\PersonResource;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    protected $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    public function store(Request $request)
    {
            // Gera um UUID
        $uuid = Uuid::uuid4()->toString();

        // Adiciona o UUID ao array de dados antes de chamar o serviço
        $data = $request->all();
        $data['uuid'] = $uuid;

        // Chama o serviço de criação com os dados atualizados
        $person = $this->personService->create($data);

        return response()->json($person, 201);
    }

    public function show($uuid)
    {
        $person = $this->personService->findByUuid($uuid);

        if (!$person) {
            return response()->json(['error' => 'Person not found'], 404);
        }

        return response()->json($person);
    }
}
