<?php

namespace App\Models;

use App\Shared\DBTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDataFeed extends Model
{
    use HasFactory;

    const ID = 'id';
    const URL = "url";
    const IS_DOWNLOADED = "isDownloaded";
    const IS_PARSED = "isParsed";
    const LAST_FEED_ACCESS = "lastFeedAccess";
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';


    protected $table = DBTable::MASTER_FEEDS;

    protected $dateFormat = '';

    protected $fillable = [
        self::URL,
        self::IS_DOWNLOADED,
        self::IS_PARSED,
        self::LAST_FEED_ACCESS
    ];

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
        return $this->hasMany(ProductDetailFeed::class, 'feed_id', 'id');
    }
}
