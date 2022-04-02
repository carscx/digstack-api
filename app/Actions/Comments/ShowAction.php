<?php

namespace App\Actions\Comments;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Comment;

class ShowAction
{
    /**
     * Comments Show Action.
     *
     * @param  int $id
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(int $id = null)
    {
        try {
            $comment = $id ? Comment::find($id) : Comment::all();

            if (!$comment)
                return HandlerResponse::responseJSON([
                    'message' => 'Comment ID Not Found.'
                ], 404);

            return HandlerResponse::responseJSON(['data' => $comment]);
        } catch (\Throwable $th) {
            // throw $th;
            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
