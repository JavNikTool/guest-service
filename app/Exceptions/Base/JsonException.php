<?php

declare(strict_types=1);

namespace App\Exceptions\Base;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class JsonException extends Exception
{
    public function render(): Response
    {
        return response([
            'status' => 'error',
            'data' => [
                'message' => $this->getMessage(),
                'type' => Str::afterLast(get_class($this), '\\'),
                'code' => $this->getCode(),
            ],
        ], $this->getCode());
    }
}
