<?php

namespace App\Repositories;

use App\Exceptions\Record\RecordNotCreatedException;
use App\Exceptions\Record\RecordNotFoundException;
use App\Models\Country;

class CountryRepository
{
    /**
     * @throws RecordNotCreatedException
     */
    public function create(string $title): Country
    {
        try {
            return Country::query()->create(['title' => $title]);
        } catch (\Exception $e) {
            throw new RecordNotCreatedException($e->getMessage());
        }
    }

    /**
     * @throws RecordNotFoundException
     */
    public function find(string $title): ?Country
    {
        try {
            return Country::query()
                ->where(['title' => $title])
                ->get()
                ->first();
        } catch (\Exception $e) {
            throw new RecordNotFoundException($e->getMessage());
        }
    }

}
