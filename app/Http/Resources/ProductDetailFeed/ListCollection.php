<?php

namespace App\Http\Resources\ProductDetailFeed;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ListCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\ProductDetailFeed\ListResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
