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
    public function __construct()
    {
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
        return view('', ['data' => new ListCollection($result)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = MasterDataFeed::create($request->validated());

        return view('', ['data' => new ShowResource($data)]);
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

        if (!$data) return redirect()->route('notfound');

        return view('', ['data' => new ShowResource($data)]);
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

        if (!$data) return redirect()->route('notfound');

        $data[MasterDataFeed::URL] = $request->get(MasterDataFeed::URL);

        $data->save();

        return view('', ['data' => new ShowResource($data)]);
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
