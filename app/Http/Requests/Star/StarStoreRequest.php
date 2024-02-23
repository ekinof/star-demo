<?php

declare(strict_types=1);

namespace App\Http\Requests\Star;

use Illuminate\Foundation\Http\FormRequest;

class StarStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'imageUrl' => ['required', 'url', 'max:255'],
            'description' => ['required', 'string'],
        ];
    }
}
