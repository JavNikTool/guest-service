<?php

declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ResourceRepository
{
    public function getAll(): Collection;

    public function destroy(Model $model): void;

    public function update(Model $model, array $data): void;

    public function store(array $data): Model;
}
