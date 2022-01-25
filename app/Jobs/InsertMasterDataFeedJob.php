<?php

namespace App\Jobs;

use App\Events\MasterDataMappedCompletedEvent;
use Throwable;
use App\Models\MasterDataFeed;
use Illuminate\Bus\Batch;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InsertMasterDataFeedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $programs = [];

        foreach ($this->data as $program) {
            $model = [
                MasterDataFeed::URL => $program[MasterDataFeed::URL],
                MasterDataFeed::FEED_ID => $program[MasterDataFeed::FEED_ID]
            ];
            array_push($programs, MasterDataFeed::create($model));
        }

        $batchChain = [];
        foreach ($programs as $program) {
            $batchChain[] = new MapProductDetailFeedJob($program);
        }

        Bus::batch($batchChain)->dispatch();

        // event(new MasterDataMappedCompletedEvent($programs));
        // return;
    }

    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
    }
}
