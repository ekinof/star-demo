<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Star\StarStoreRequest;
use App\Http\Requests\Star\StarUpdateRequest;
use App\Http\Resources\StarResource;
use App\Models\Star;
use App\Repository\StarRepository;
use App\Service\Star\StarBuilder;
use App\Service\Star\StarUpdater;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StarController extends Controller
{
    public function __construct(
        private readonly StarRepository $starRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        return StarResource::collection($this->starRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StarStoreRequest $request,
        StarBuilder $starBuilder,
    ): StarResource {
        $star = $starBuilder->build($request);

        $star->save();

        return new StarResource($star);
    }

    /**
     * Display the specified resource.
     */
    public function show(Star $star)
    {
        return new StarResource($star);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        StarUpdateRequest $request,
        Star $star,
        StarUpdater $starUpdater,
    ): StarResource {
        $starUpdater->update($request, $star);

        $star->save();

        return new StarResource($star);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Star $star)
    {
        $star->delete();

        return response()->json(null, 204);
    }
}
