<?php

namespace App\Http\Resources;

use App\Models\Part;
use Illuminate\Http\Request;

class PartResource extends Resource
{
    /** @var Part */
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
            'serial_number' => $this->resource->serial_number,
            'car_id' => $this->resource->car_id
        ];
    }
}
