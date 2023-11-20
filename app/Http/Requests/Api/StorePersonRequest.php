<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;


class CreatePersonRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'apelido' => 'required|unique:people,nickname|max:32',
            'nome' => 'required|max:100',
            'nascimento' => 'required|date_format:Y-m-d',
            'stack.*' => 'nullable|string|max:32',
        ];
    }
}
