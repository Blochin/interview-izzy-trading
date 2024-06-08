<?php

namespace App\Http\Resources;

use App\Models\Car;
use Illuminate\Http\Request;

class CarResource extends Resource
{
    /** @var Car */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'registration_number' => $this->resource->registration_number,
            'is_registered' => (boolean) $this->resource->is_registered,
            'parts' => PartResource::collection($this->resource->parts)
        ];
    }
}
