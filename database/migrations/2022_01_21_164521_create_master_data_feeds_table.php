<?php

use App\Models\MasterDataFeed;
use App\Shared\DBTable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDataFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DBTable::MASTER_FEEDS, function (Blueprint $table) {
            $table->bigIncrements(MasterDataFeed::ID);
            $table->string(MasterDataFeed::URL);
            $table->string(MasterDataFeed::FEED_ID);
            $table->boolean(MasterDataFeed::IS_DOWNLOADED)->default(false)->nullable();
            $table->boolean(MasterDataFeed::IS_PARSED)->default(false)->nullable();
            $table->dateTime(MasterDataFeed::LAST_FEED_ACCESS)->nullable();
            $table->timestamp(MasterDataFeed::CREATED_AT)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp(MasterDataFeed::UPDATED_AT)->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DBTable::MASTER_FEEDS);
    }
}
