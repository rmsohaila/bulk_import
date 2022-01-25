<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductDetailFeed\CreateRequest;
use App\Http\Requests\ProductDetailFeed\UpdateRequest;
use App\Http\Resources\ProductDetailFeed\ListCollection;
use App\Models\ProductDetailFeed;
use App\Shared\APIResponse;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class ProductFeedController extends Controller
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

        // Apply sorting if any
        $products->when($request->has(['sort', 'order']), function ($query) {
            switch (strtolower(request('sort'))) {
                case 'brand':
                    $sort = ProductDetailFeed::BRAND;
                    break;
                case 'createdAt':
                    $sort = ProductDetailFeed::CREATED_AT;
                    break;
                case 'lastModified':
                    $sort = ProductDetailFeed::UPDATED_AT;
                    break;
                default:
                    $sort = request('sort');
                    break;
            }
            return $query->orderBy($sort, request('order') ?? 'asc');
        });

        // Apply paging if any
        if ($request->hasAny(['page', 'size'])) {
            $result = (new ListCollection($products->paginate($request->size ?? 10)))->withPaginate();
            return view('', ['data' => $result]);
        }
        return view('', ['data' => new ListCollection($products->get())]);
    }
}
