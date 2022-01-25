<?php

namespace App\Http\Resources\ProductDetailFeed;

use App\Http\Resources\BaseResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class ListCollection
 * To be used in Master Feed Table Listing
 * @package App\Http\Resources\ProductDetailFeed
 * @mixin ProductDetailFeed\ListResource
 */
class ListCollection extends BaseResourceCollection
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
