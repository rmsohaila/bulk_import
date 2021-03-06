<?php

namespace App\Http\Resources\ProductDetailFeed;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ShowResource
 * To be used in conjunction with the Master Data List Collection
 * @package App\Http\Resources\ProductDetailFeed
 * mixin ProductDetailFeed
 */
class ListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
