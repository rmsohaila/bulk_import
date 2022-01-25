<?php

namespace App\Jobs;

use App\Models\MasterDataFeed;
use App\Models\ProductDetailFeed;
use App\Services\FeedReader;
use App\Utilities\GetProductElement;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Throwable;

class MapProductDetailFeedJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $program;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($program)
    {
        $this->program = $program;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Read XMl file
        $feedReader = new FeedReader();
        $products = $feedReader->read($this->program[MasterDataFeed::URL]);

        $batchChain = [];

        $chunks = array_chunk($products['produkt'], 1000);

        foreach ($chunks as $chunk) {

            $data = array_map(function ($item) {
                return [
                    ProductDetailFeed::FEED_ID => $this->program[MasterDataFeed::ID],
                    ProductDetailFeed::KATEGORINAVN =>  GetProductElement::sanitize($item, ProductDetailFeed::KATEGORINAVN),
                    ProductDetailFeed::FORHANDLER => GetProductElement::sanitize($item, ProductDetailFeed::FORHANDLER),
                    ProductDetailFeed::BRAND => GetProductElement::sanitize($item, ProductDetailFeed::BRAND),
                    ProductDetailFeed::PRODUKTNAVN => GetProductElement::sanitize($item, ProductDetailFeed::PRODUKTNAVN),
                    ProductDetailFeed::PRODUKTID => GetProductElement::sanitize($item, ProductDetailFeed::PRODUKTID),
                    ProductDetailFeed::EAN => GetProductElement::sanitize($item, ProductDetailFeed::EAN),
                    ProductDetailFeed::BESKRIVELSE => GetProductElement::sanitize($item, ProductDetailFeed::BESKRIVELSE),
                    ProductDetailFeed::NYPRIS => GetProductElement::sanitize($item, ProductDetailFeed::NYPRIS),
                    ProductDetailFeed::GLPRIS => GetProductElement::sanitize($item, ProductDetailFeed::GLPRIS),
                    ProductDetailFeed::LAGERANTAL => GetProductElement::sanitize($item, ProductDetailFeed::LAGERANTAL),
                    ProductDetailFeed::LEVERINGSTID => GetProductElement::sanitize($item, ProductDetailFeed::LEVERINGSTID),
                    ProductDetailFeed::BILLEDURL => GetProductElement::sanitize($item, ProductDetailFeed::BILLEDURL),
                    ProductDetailFeed::VAREURL => GetProductElement::sanitize($item, ProductDetailFeed::VAREURL),
                    ProductDetailFeed::FRAGTOMK => GetProductElement::sanitize($item, ProductDetailFeed::FRAGTOMK),
                    ProductDetailFeed::CREATED_AT => now()->toDateTimeString(),
                    ProductDetailFeed::UPDATED_AT => now()->toDateTimeString(),
                ];
            }, $chunk);

            $batchChain[] = new InsertProductDetailFeedJob($data);
        }

        Bus::batch($batchChain)->dispatch();
    }


    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
    }
}
