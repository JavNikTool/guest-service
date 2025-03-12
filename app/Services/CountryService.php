<?php

namespace App\Services;

use App\Exceptions\Record\RecordNotCreatedException;
use App\Exceptions\Record\RecordNotFoundException;
use App\Models\Country;
use App\Repositories\CountryRepository;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;

class CountryService
{
    public function __construct(public CountryRepository $repository)
    {

    }

    /**
     * @throws RecordNotCreatedException
     */
    public function create(string $title): Country
    {
        return $this->repository->create($title);
    }

    /**
     * @throws RecordNotFoundException
     */
    public function find(string $title): ?Country
    {
        return $this->repository->find($title);
    }

    /**
     * @throws RecordNotFoundException
     * @throws RecordNotCreatedException
     */
    public function FindOrCreate(string $title): Country
    {
        $country = $this->find($title);

        if(!$country) {
            $country = $this->create($title);
        }

        return $country;
    }

    public function getCountryByPhone($phone): ?string
    {
        $phoneUtil = PhoneNumberUtil::getInstance();

        try {
            $numberProto = $phoneUtil->parse($phone, null);

            $countryCode = $phoneUtil->getRegionCodeForNumber($numberProto);

            return $countryCode ?: null;
        } catch (NumberParseException $e) {
            return null;
        }
    }
}
