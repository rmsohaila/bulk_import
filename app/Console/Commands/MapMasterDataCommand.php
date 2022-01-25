<?php

namespace App\Console\Commands;

use App\Jobs\InsertMasterDataFeedJob;
use App\Services\FeedReader;
use App\Shared\DBTable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MapMasterDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'map:master';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the master data mapping';


    private FeedReader $feedReader;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(FeedReader $feedReader)
    {
        parent::__construct();
        $this->feedReader = $feedReader;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('memory_limit', '2064M');

        $url = env('MASTER_FEED_URL');

        $arr = $this->feedReader->read($url);

        DB::delete('DELETE FROM ' . DBTable::MASTER_FEEDS);

        InsertMasterDataFeedJob::dispatchSync($arr["program"]);

        return "job executed";
    }
}
