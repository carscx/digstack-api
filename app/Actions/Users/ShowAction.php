<?php

namespace App\Actions\Users;

use App\Actions\Handlers\HandlerResponse;
use App\Models\User;
use Illuminate\Http\Request;

class ShowAction
{
    /**
     * Users Show Action.
     *
     * @param  int $id
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(int $id)
    {
        try {
            $user = User::find($id);

            if (!$user)
                return HandlerResponse::responseJSON([], 404);

            return HandlerResponse::responseJSON(['data' => $user]);
        } catch (\Throwable $th) {
            // throw $th;
            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
