<?php

namespace App\Http\Resources\MasterDataFeed;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ListResource
 * To be used in conjunction with the Master Data List Collection
 * @package App\Http\Resources\MasterDataFeed
 * mixin MasterDataFeed
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
