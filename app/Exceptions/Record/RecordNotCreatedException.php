<?php

namespace App\Exceptions\Record;

use App\Exceptions\Base\JsonException;

class RecordNotCreatedException extends JsonException
{
    protected $code = 500;
}
