<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\SimplePropertyResource;

class PropertyCollection extends ResourceCollection
{
    public $collects = SimplePropertyResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'links' => [
                'url' => 'https://grafikart.fr'
            ]
        ];
    }
}
