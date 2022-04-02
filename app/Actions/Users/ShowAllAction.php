<?php

namespace App\Actions\Users;

use App\Actions\Handlers\HandlerResponse;
use App\Models\User;
use Illuminate\Http\Request;

class ShowAllAction
{
    /**
     * Users Show All Action.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(Request $request)
    {
        try {
            $limit      = $request->query('limit', 100);
            $offset     = $request->query('offset', 0);
            $user_id    = $request->query('user_id');
            $start_date = $request->query('start_date', '1970-01-01');
            $end_date   = $request->query('end_date', '9999-12-31');

            $user = User::limit($limit)
                ->offset($offset)
                ->where('id', 'LIKE', $user_id)
                ->whereBetween('created_at', ["$start_date 00:00:00", "$end_date 23:59:59"])
                ->get();

            return HandlerResponse::responseJSON([
                'data' => $user,
                'meta' => [
                    'limit'          => (int) $limit,
                    'offset'         => (int) $offset,
                    'filtered_total' => $user->count(),
                    'total'          => User::count()
                ]
            ]);
        } catch (\Throwable $th) {
            // throw $th;
            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
