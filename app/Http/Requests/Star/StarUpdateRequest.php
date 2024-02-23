<?php

declare(strict_types=1);

namespace App\Http\Requests\Star;

use Illuminate\Foundation\Http\FormRequest;

class StarUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => ['string', 'max:255'],
            'lastName' => ['string', 'max:255'],
            'imageUrl' => ['url', 'max:255'],
            'description' => ['string'],
        ];
    }
}
