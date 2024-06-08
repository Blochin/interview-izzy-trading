<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    public static function collection($resource)
    {
        return parent::collection($resource)->map->toArray(request());
    }

    public static function make(...$parameters)
    {
        return parent::make(...$parameters)->toArray(request());
    }
}
