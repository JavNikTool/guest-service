<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ResourceService
{
    public function getAll(): Collection;

    public function destroy(Model $model): void;

    public function store(array $data): Model;

    public function update(Model $model, array $data): void;
}
