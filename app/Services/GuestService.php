<?php

namespace App\Services;

use App\Contracts\ResourceService;
use App\Exceptions\Record\RecordNotCreatedException;
use App\Exceptions\Record\RecordNotDeletedException;
use App\Exceptions\Record\RecordNotFoundException;
use App\Exceptions\Record\RecordNotUpdatedException;
use App\Repositories\GuestRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class GuestService implements ResourceService
{
    public function __construct(public GuestRepository $repository)
    {

    }

    /**
     * @throws RecordNotFoundException
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    /**
     * @throws RecordNotDeletedException
     */
    public function destroy(Model $model): void
    {
        $this->repository->destroy($model);
    }

    /**
     * @throws RecordNotCreatedException
     * @throws RecordNotFoundException
     */
    public function store(array $data): Model
    {
        if(empty($data['country_id'])) {
            $countryService = app(CountryService::class);

            $countryCode = $countryService->getCountryByPhone($data['phone']);

            if($countryCode)
            {
                $data['country_id'] = $countryService->findOrCreate($countryCode)->id;
            }
        }

        return $this->repository->store($data);
    }

    /**
     * @throws RecordNotUpdatedException
     */
    public function update(Model $model, array $data): void
    {
        $this->repository->update($model, $data);
    }

}
