<?php

namespace App\Shared;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class APIResponse
{
    private static $message;
    public static function withMessage($message)
    {
        static::$message = $message;
        return new static;
    }

    /**
     * @param object $data|$errors|$message any|null
     * @param object $message  string|object|array|null
     * @param integer $status  HTTP Status Code
     * 
     * @return application/json with status code HTTP_OK
     */
    public static function json($data = null, $status = 200)
    {
        $success = ($status == Response::HTTP_OK ||
            $status == Response::HTTP_NO_CONTENT ||
            $status == Response::HTTP_ACCEPTED);

        // If Response is not valid
        if ($success) {

            if (is_array($data) && !property_exists(((object) $data), 'data')) {
                // If $data is not an object then it will be array of messages with given status or 200 by default
                return response()->json(['messages' => $data], $status);
            } else {
                $message = isset(self::$message) ? self::$message : null;

                // array: data,pagination
                // object: collection
                if (is_array($data)) {
                    $_data = (object) $data;
                    if (property_exists($_data, 'pagination')) {
                        return response()->json([
                            'data' => $data['data'],
                            'pagination' => $data['pagination'],
                            'message' => $message
                        ], $status);
                    } else {
                        return response()->json([
                            'data' => $data['data'],
                            'pagination' => null,
                            'message' => $message
                        ], $status);
                    }
                } else {
                    if ($data instanceof ResourceCollection) {
                        return response()->json([
                            'data' => $data->collection,
                            'pagination' => null,
                            'message' => $message
                        ], $status);
                    } else {
                        return response()->json([
                            'data' => $data,
                            'pagination' => null,
                            'message' => $message
                        ], $status);
                    }
                }
            }
        } else {
            // if $data contains only errors
            return response()->json(['errors' => $data], $status);
        }
    }
}
