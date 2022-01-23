<?php

class XMLReader
{
    public function read($url): array
    {
        $xml = simplexml_load_file($url);

        return (array) $xml;
    }
}
