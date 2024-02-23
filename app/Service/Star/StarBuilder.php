<?php

declare(strict_types=1);

namespace App\Service\Star;

use App\Http\Requests\Star\StarStoreRequest;
use App\Models\Star;

class StarBuilder
{
    public function build(StarStoreRequest $request): Star
    {
        $star = (new Star());
        $star->first_name = $request->get('firstName');
        $star->last_name = $request->get('lastName');
        $star->image_url = $request->get('imageUrl');
        $star->description = $request->get('description');

        return $star;
    }
}
