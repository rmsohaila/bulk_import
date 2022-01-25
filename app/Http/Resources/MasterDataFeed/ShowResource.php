<?php

namespace App\Http\Resources\MasterDataFeed;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ListResource
 * To be used for showing a single record
 * @package App\Http\Resources\MasterDataFeed
 * mixin MasterDataFeed
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
