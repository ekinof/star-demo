<?php

declare(strict_types=1);

namespace App\Service\Star;

use App\Http\Requests\Star\StarUpdateRequest;
use App\Models\Star;

class StarUpdater
{
    public function update(StarUpdateRequest $request, Star $star): void
    {
        if ($request->has('firstName')) {
            $star->first_name = $request->get('firstName');
        }

        if ($request->has('lastName')) {
            $star->last_name = $request->get('lastName');
        }

        if ($request->has('imageUrl')) {
            $star->image_url = $request->get('imageUrl');
        }

        if ($request->has('description')) {
            $star->description = $request->get('description');
        }
    }
}
