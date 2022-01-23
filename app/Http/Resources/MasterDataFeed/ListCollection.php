<?php

namespace App\Http\Resources\MasterDataFeed;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ListCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\MasterDataFeed\ListResource';

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
