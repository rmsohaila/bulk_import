<?php

namespace App\Http\Resources\MasterDataFeed;

use App\Models\MasterDataFeed;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ListResource
 * To be used in conjunction with the Master Data List Collection but only with meta information
 * @package App\Http\Resources\MasterDataFeed
 * mixin MasterDataFeed 
 */
class MetaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            MasterDataFeed::ID => $this->id,
            MasterDataFeed::URL => $this->url,
            'productCount' => $this->products->count()
        ];
    }
}
