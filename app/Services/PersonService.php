<?php

namespace App\Services;

use App\Models\Person;

class PersonService
{
    public function create(array $data)
    {
        return Person::create($data);
    }

    public function findByUuid(string $uuid)
    {
        return Person::where('uuid', $uuid)->firstOrFail();
    }

    public function search($term)
    {
        return Person::where('name', 'like', "%{$term}%")
        ->orWhere(function ($query) use ($term) {
            $query->where('nickname', 'like', "%{$term}%");
        })
        ->orWhere(function ($query) use ($term) {
            $query->where('stack', 'like', "%{$term}%");
        })
        ->get();
    }

    public function count()
    {
        return Person::count();
    }
}
