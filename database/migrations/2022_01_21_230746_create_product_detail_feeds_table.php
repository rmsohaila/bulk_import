<?php

use App\Models\MasterDataFeed;
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
            $table->foreignId(ProductDetailFeed::FEED_ID)
                ->constrained(DBTable::MASTER_FEEDS)
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string(ProductDetailFeed::FORHANDLER);
            $table->string(ProductDetailFeed::KATEGORINAVN)->nullable();
            $table->string(ProductDetailFeed::BRAND)->nullable();
            $table->text(ProductDetailFeed::PRODUKTNAVN)->nullable();
            $table->string(ProductDetailFeed::PRODUKTID)->nullable();
            $table->string(ProductDetailFeed::EAN)->nullable();
            $table->text(ProductDetailFeed::BESKRIVELSE)->nullable();
            $table->string(ProductDetailFeed::LAGERANTAL)->nullable();
            $table->string(ProductDetailFeed::LEVERINGSTID)->nullable();
            $table->text(ProductDetailFeed::BILLEDURL)->nullable();
            $table->text(ProductDetailFeed::VAREURL)->nullable();

            $table->string(ProductDetailFeed::SIZE)->nullable();
            $table->string(ProductDetailFeed::COLOR)->nullable();

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
