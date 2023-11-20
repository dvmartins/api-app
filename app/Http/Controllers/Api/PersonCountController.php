<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PersonService;


class PersonCountController extends Controller
{
    protected $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    public function __invoke()
    {
        $count = $this->personService->count();

        return response()->json(['count' => $count]);
    }
}
