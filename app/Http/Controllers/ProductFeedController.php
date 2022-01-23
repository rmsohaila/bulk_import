<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductDetailFeed\CreateRequest;
use App\Http\Requests\ProductDetailFeed\UpdateRequest;
use App\Models\ProductFeed;
use App\Http\Requests\UpdateProductFeedRequest;

class ProductFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductFeed  $productFeed
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductFeedRequest  $request
     * @param  \App\Models\ProductFeed  $productFeed
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductFeed  $productFeed
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
