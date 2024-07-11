<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OptionResource; // Import OptionResource

/**
 * @property Property $resource
 */

class PropertyResource extends JsonResource
{
    public static $wrap = 'property';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            $this->mergeWhen(true, [
                'price' => $this->resource->price,
                'surface' => $this->resource->surface
            ]),
            'options' => OptionResource::collection($this->whenLoaded('options'))
        ];
    }
}
