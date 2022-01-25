<?php

namespace App\Http\Resources\ProductDetailFeed;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ShowResource
 * To be used for showing a single record
 * @package App\Http\Resources\ProductDetailFeed
 * mixin ProductDetailFeed
 */
class ShowResource extends JsonResource
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
