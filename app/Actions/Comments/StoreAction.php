<?php

namespace App\Actions\Comments;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Comment;
use Illuminate\Http\Request;

class StoreAction
{
    /**
     * Comments Store Action.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(Request $request)
    {
        try {
            $comment = new Comment();
            $comment->user_id = $request->user('sanctum')->id;
            $comment->post_id = $request['post_id'];
            $comment->message = $request['message'];

            $comment->save();

            return HandlerResponse::responseJSON([
                'message' => 'Comment Created.'
            ], 201);
        } catch (\Throwable $th) {
            // throw $th;
            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
