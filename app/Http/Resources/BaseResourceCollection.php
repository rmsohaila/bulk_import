<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseResourceCollection extends ResourceCollection
{
    // private $res;
    public function __construct($resource)
    {
        // $this->res = $resource;
        parent::__construct($resource);
    }

    protected function wrapPagination()
    {
        if (!method_exists($this->resource, 'currentPage')) return null;

        $startIndex = (($this->currentPage() * $this->perPage()) - $this->perPage()) + 1;
        $endIndex = ($this->currentPage() * $this->perPage());

        return [
            // total number of records
            'length' => +$this->total(),
            // number of records to be shown in page
            'size' => +$this->perPage(),
            // page number
            'page' => +$this->currentPage() - 1,
            // last page number
            'lastPage' => +$this->lastPage(),
            // index of first record in current page
            'startIndex' => +$startIndex - 1, // wrong it should be 5 on page#1
            // index of last record in current page
            'endIndex' => +$endIndex - 1 // wrong it should be 4 on page#1, should be 9 on page#2
        ];
    }

    public function withPaginate()
    {
        return [
            'data' => $this->collection,
            'pagination' => $this->wrapPagination()
        ];
    }

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'pagination' => $this->wrapPagination()
        ];
    }
}
