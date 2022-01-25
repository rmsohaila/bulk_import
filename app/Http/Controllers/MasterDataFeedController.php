<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasterDataFeed\CreateRequest;
use App\Http\Requests\MasterDataFeed\UpdateRequest;
use App\Http\Resources\MasterDataFeed\ListCollection;
use App\Http\Resources\MasterDataFeed\MetaResource;
use App\Http\Resources\MasterDataFeed\ShowResource;
use App\Jobs\InsertMasterDataFeedJob;
use App\Jobs\MapProductDetailFeedJob;
use App\Models\MasterDataFeed;
use App\Shared\APIResponse;
use Illuminate\Http\Response;

use App\Services\FeedReader;
use App\Shared\DBTable;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class MasterDataFeedController extends Controller
{
    private FeedReader $feedReader;
    public function __construct(FeedReader $feedReader)
    {
        $this->feedReader = $feedReader;
    }

    public function xml()
    {
        dd('done');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = MasterDataFeed::get();
        $result = new ListCollection($result);
        return APIResponse::json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = MasterDataFeed::create($request->validated());

        return APIResponse::json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterDataFeed  $masterDataFeed
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MasterDataFeed::find($id);

        if (!$data) return APIResponse::json("Not Found", Response::HTTP_NOT_FOUND);

        return APIResponse::json(new MetaResource($data));

        return APIResponse::json(new ShowResource($data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterDataFeedRequest  $request
     * @param  \App\Models\MasterDataFeed  $masterDataFeed
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = MasterDataFeed::find($id);

        if (!$data) return APIResponse::json("Not Found", Response::HTTP_NOT_FOUND);

        $data[MasterDataFeed::URL] = $request->get(MasterDataFeed::URL);

        $data->save();

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterDataFeed  $masterDataFeed
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterDataFeed $masterDataFeed)
    {
        //
    }
}
