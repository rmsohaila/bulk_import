<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductDetailFeed\CreateRequest;
use App\Http\Requests\ProductDetailFeed\UpdateRequest;
use App\Http\Resources\ProductDetailFeed\ListCollection;
use App\Models\ProductDetailFeed;
use App\Shared\APIResponse;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('product_list'), Response::HTTP_UNAUTHORIZED, trans('global.forbiden'));

        $products = ProductDetailFeed::query();

        // Where Filters
        $products->when(request('search'), function ($query, $searchToken) {
            return $query->where(function ($query) use ($searchToken) {
                $query->where('title', 'like', "%{$searchToken}%");
            });
        });

        // Apply paging if any
        if ($request->hasAny(['page', 'size'])) {
            $result = (new ListCollection($products->paginate($request->size ?? 10)))->withPaginate();
            return APIResponse::json($result);
        }

        return APIResponse::json(new ListCollection($products->get()));
    }
}
