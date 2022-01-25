<?php

namespace App\Models;

use App\Shared\DBTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDataFeed extends Model
{
    use HasFactory;

    const ID = 'id';
    const URL = "feed_url";
    const FEED_ID = "feed_id";
    const IS_DOWNLOADED = "isDownloaded";
    const IS_PARSED = "isParsed";
    const LAST_FEED_ACCESS = "lastFeedAccess";
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';


    protected $table = DBTable::MASTER_FEEDS;

    protected $dateFormat = '';

    protected $guarded = [];

    protected $casts = [
        self::LAST_FEED_ACCESS => 'date',
        self::CREATED_AT  => 'datetime',
        self::UPDATED_AT => 'datetime',
    ];

    /**
     * Get all of the products for the MasterDataFeed
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(
            ProductDetailFeed::class,
            ProductDetailFeed::FEED_ID
        );
    }
}
