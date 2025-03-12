<?php

namespace App\Exceptions\Record;

use App\Exceptions\Base\JsonException;

class RecordNotUpdatedException extends JsonException
{
    protected $code = 500;
}
