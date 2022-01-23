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
    const FEED_ID = "feed_id";
    const KATEGORINAVN = "kategorinavn";
    const FORHANDLER = "forhandler";
    const BRAND = "brand";
    const PRODUKTNAVN = "produktnavn";
    const PRODUKTID = "produktid";
    const EAN = "ean";
    const BESKRIVELSE = "beskrivelse";
    const NYPRIS = "nypris";
    const GLPRIS = "glpris";
    const LAGERANTAL = "lagerantal";
    const LEVERINGSTID = "leveringstid";
    const BILLEDURL = "billedurl";
    const VAREURL = "vareurl";
    const FRAGTOMK = "fragtomk";

    protected $table = DBTable::PRODUCT_DETAIL_FEEDS;

    protected $dateFormat = '';

    protected $fillable = [
        self::FEED_ID,
        self::KATEGORINAVN,
        self::FORHANDLER,
        self::BRAND,
        self::PRODUKTNAVN,
        self::PRODUKTID,
        self::EAN,
        self::BESKRIVELSE,
        self::NYPRIS,
        self::GLPRIS,
        self::LAGERANTAL,
        self::LEVERINGSTID,
        self::BILLEDURL,
        self::VAREURL,
    ];

    protected $casts = [
        self::CREATED_AT  => 'datetime',
        self::UPDATED_AT => 'datetime',
    ];

    /**
     * Get the MasterDataFeed that owns the ProductDetailFeed
     */
    public function masterDataFeed()
    {
        return $this->belongsTo(MasterDataFeed::class, 'feed_id');
    }
}
