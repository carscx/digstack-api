<?php

namespace App\Actions\Users;

use App\Actions\Handlers\HandlerResponse;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DestroyAction
{
    /**
     * Update the specified resource in storage.
     * 
     * @param  int  $id
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute($id)
    {
        try {
            $user = User::find($id);
            if (!$user)
                return HandlerResponse::responseJSON([
                    'message' => 'User ID Not Found.'
                ], 404);

            $user->status = '0';
            $user->save();

            return HandlerResponse::responseJSON([
                'message' => 'User Disabled.',
            ]);
        } catch (\Throwable $th) {
            //throw $th;

            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
