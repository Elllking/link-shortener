<?php

namespace App\Http\Resources\Link;

use Illuminate\Http\Resources\Json\JsonResource;

class LinkDataResource extends JsonResource
{
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "link" => $this->resource->link,
            "short" => url()->current() . '/' . $this->resource->short,
        ];
    }
}
