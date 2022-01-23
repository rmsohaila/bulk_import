<?php

use App\Models\ProductDetailFeed;
use App\Shared\DBTable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTable::PRODUCT_DETAIL_FEEDS, function (Blueprint $table) {
            $table->bigIncrements(ProductDetailFeed::ID);
            $table->unsignedBigInteger(ProductDetailFeed::FEED_ID);

            $table->string(ProductDetailFeed::FORHANDLER);
            $table->string(ProductDetailFeed::KATEGORINAVN)->nullable();
            $table->string(ProductDetailFeed::BRAND)->nullable();
            $table->string(ProductDetailFeed::PRODUKTNAVN)->nullable();
            $table->string(ProductDetailFeed::PRODUKTID)->nullable();
            $table->string(ProductDetailFeed::EAN)->nullable();
            $table->string(ProductDetailFeed::BESKRIVELSE)->nullable();
            $table->string(ProductDetailFeed::LAGERANTAL)->nullable();
            $table->string(ProductDetailFeed::LEVERINGSTID)->nullable();
            $table->string(ProductDetailFeed::BILLEDURL)->nullable();
            $table->string(ProductDetailFeed::VAREURL)->nullable();

            $table->float(ProductDetailFeed::NYPRIS)->nullable();
            $table->float(ProductDetailFeed::GLPRIS)->nullable();
            $table->float(ProductDetailFeed::FRAGTOMK)->nullable();

            $table->timestamp(ProductDetailFeed::CREATED_AT)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp(ProductDetailFeed::UPDATED_AT)->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTable::PRODUCT_DETAIL_FEEDS);
    }
}
