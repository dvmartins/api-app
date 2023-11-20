<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PersonService;
use Illuminate\Http\Request;

class PersonSearchController extends Controller
{
    protected $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    public function __invoke(Request $request)
    {
        if (!$request->has('t')) {
            return response()->json(['error' => 'A query string t é obrigatória.'], 400);
        }

        $term = $request->get('t');
        $people = $this->personService->search($term);

        return response()->json($people);
    }
}
