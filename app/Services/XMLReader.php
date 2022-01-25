<?php

namespace App\Services;

class FeedReader
{
    public function __construct()
    {
    }

    public function read($url)
    {
        $xml = simplexml_load_file($url);

        $array = json_decode(json_encode((array)($xml)), true);

        return $array;
    }
}
