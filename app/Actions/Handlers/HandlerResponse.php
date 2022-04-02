<?php

namespace App\Actions\Handlers;

/**
 * Handler Response JSON data
 */
class HandlerResponse
{
    /**
     * @param int $status
     * @return string $message
     */
    private static function getMessage($status)
    {
        $message = [
            200 => 'OK.',
            201 => 'Created.',
            400 => 'Bad Request.',
            401 => 'Unauthenticated.',
            403 => 'Forbidden.',
            404 => 'Not Found.',
            405 => 'Method Not Allowed.',
            422 => 'Validation Errors.',
            500 => 'Internal Server Error.',
        ];

        return $message[$status];
    }

    /**
     * @param  mixed $data
     * @param  int $status [200, 201, 400, 401, 403, 404, 405, 422, 500]
     * @return \Illuminate\Http\Response
     */
    public static function responseJSON($data = [], $status = 200)
    {
        if ($status >= 200 && $status < 400)
            return response()->json([
                'message'   => $data['message'] ?? self::getMessage($status),
                'data'      => $data['data']    ?? [],
                'meta'      => $data['meta']    ?? [],
            ], $status);
        else if ($status >= 400 && $status < 500)
            return response()->json([
                'message'  => $data['message']  ?? self::getMessage($status),
                'errors'   => $data['errors']   ?? [],
            ], $status);
        else
            return response()->json([
                'message'  => $data['message']  ?? self::getMessage($status),
            ], $status);
    }
}
