<?php

namespace App\Http\Controllers;

use App\Exceptions\Record\RecordNotCreatedException;
use App\Exceptions\Record\RecordNotDeletedException;
use App\Exceptions\Record\RecordNotFoundException;
use App\Exceptions\Record\RecordNotUpdatedException;
use App\Http\Requests\Guest\StoreRequest;
use App\Http\Requests\Guest\UpdateRequest;
use App\Http\Resources\Guest\GuestResource;
use App\Models\Guest;
use App\Services\GuestService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GuestController extends Controller
{

    public function __construct(public GuestService $service)
    {

    }


    /**
     * @throws RecordNotFoundException
     */
    public function index(): AnonymousResourceCollection
    {
        $guests = $this->service->getAll();

        return GuestResource::collection($guests);
    }


    /**
     * @throws RecordNotFoundException
     * @throws RecordNotCreatedException
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $guest = $this->service->store($data);

        return GuestResource::make($guest);
    }


    public function show(Guest $guest)
    {
        return GuestResource::make($guest);
    }


    /**
     * @throws RecordNotUpdatedException
     */
    public function update(UpdateRequest $request, Guest $guest): JsonResponse
    {
        $data = $request->validated();

        $this->service->update($guest, $data);

        return $this->successResponse(['message' => 'Guest updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     * @throws RecordNotDeletedException
     */
    public function destroy(Guest $guest)
    {
        $this->service->destroy($guest);

        return $this->successResponse(['message' => 'Guest deleted successfully']);
    }
}
