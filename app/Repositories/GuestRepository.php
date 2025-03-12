<?php

namespace App\Repositories;

use App\Contracts\ResourceRepository;
use App\Exceptions\Record\RecordNotCreatedException;
use App\Exceptions\Record\RecordNotDeletedException;
use App\Exceptions\Record\RecordNotFoundException;
use App\Exceptions\Record\RecordNotUpdatedException;
use App\Models\Guest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GuestRepository implements ResourceRepository
{
    /**
     * @throws RecordNotFoundException
     */
    public function getAll(): Collection
    {
        try {
            return Guest::query()
                ->orderByDesc('id')
                ->with('country')
                ->get();
        } catch (\Exception $e) {
            throw new RecordNotFoundException($e->getMessage());
        }
    }

    /**
     * @throws RecordNotDeletedException
     */
    public function destroy(Model $model): void
    {
        try {
            $model->delete();
        } catch (\Exception $e) {
            throw new RecordNotDeletedException($e->getMessage());
        }
    }

    /**
     * @throws RecordNotCreatedException
     */
    public function store(array $data): Model
    {
        try {
            return Guest::query()->create($data);
        } catch (\Exception $e) {
            throw new RecordNotCreatedException($e->getMessage());
        }
    }

    /**
     * @throws RecordNotUpdatedException
     */
    public function update(Model $model, array $data): void
    {
        try {
             $model->update($data);
        } catch (\Exception $e) {
            throw new RecordNotUpdatedException($e->getMessage());
        }
    }
}
