<?php

namespace App\Models;

use App\Shared\DBTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailFeed extends Model
{
    use HasFactory;

    const ID = 'id';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    /**
     * Foriegn Key to MasterDataFeed ID(PK)
     */
    const FEED_ID = "feed_id";

    /**
     * CATEGORY NAME
     */
    const KATEGORINAVN = "kategorinavn";

    /**
     * DEALER
     */
    const FORHANDLER = "forhandler";

    /**
     * BRAND
     */
    const BRAND = "brand";

    /**
     * PRODUCT NAME
     */
    const PRODUKTNAVN = "produktnavn";

    /**
     * PRODUCT ID
     */
    const PRODUKTID = "produktid";

    /**
     * EAN
     */
    const EAN = "ean";

    /**
     * DESCRIPTION
     */
    const BESKRIVELSE = "beskrivelse";

    /**
     * NEW PRICE
     */
    const NYPRIS = "nypris";

    /**
     * OLD PRICE
     */
    const GLPRIS = "glpris";

    /**
     * STOCK NUMBER
     */
    const LAGERANTAL = "lagerantal";

    /**
     * DELIVERY TIME
     */
    const LEVERINGSTID = "leveringstid";

    /**
     * IMAGE URL
     */
    const BILLEDURL = "billedurl";

    /**
     * PRODUCT URL
     */
    const VAREURL = "vareurl";

    /**
     * SHIPPING
     */
    const FRAGTOMK = "fragtomk";

    /**
     * COLOR
     */
    const COLOR = "color";

    /**
     * SIZE
     */
    const SIZE = "size";

    protected $table = DBTable::PRODUCT_DETAIL_FEEDS;

    protected $dateFormat = '';

    protected $guarded = [];

    protected $casts = [
        self::CREATED_AT  => 'datetime',
        self::UPDATED_AT => 'datetime',
    ];

    /**
     * Get the MasterDataFeed that owns the ProductDetailFeed
     */
    public function masterDataFeed()
    {
        return $this->belongsTo(MasterDataFeed::class);
    }
}
