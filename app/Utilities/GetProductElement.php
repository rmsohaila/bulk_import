<?php

namespace App\Utilities;

class GetProductElement
{
    static function sanitize($data, $key)
    {
        if (array_key_exists($key, $data))
            if (!is_array($data[$key]))
                return ($data[$key] ?? null);

        return null;
    }
}
