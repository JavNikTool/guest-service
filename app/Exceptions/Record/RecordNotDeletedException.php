<?php

namespace App\Exceptions\Record;

use App\Exceptions\Base\JsonException;

class RecordNotDeletedException extends JsonException
{
    protected $code = 500;
}
