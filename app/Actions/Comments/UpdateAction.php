<?php

namespace App\Actions\Comments;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Comment;
use Illuminate\Http\Request;

class UpdateAction
{
    /**
     * Comments Update Action.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute($id, Request $request)
    {
        try {
            $comment = Comment::find($id);
            if (!$comment)
                return HandlerResponse::responseJSON([
                    'message' => 'Comment ID Not Found.'
                ], 404);

            $comment->message = $request['message']  ?? $comment->message;

            if ($request->user('sanctum')->tokenCan('*')) {
                $comment->user_id  = $request['user_id']  ?? $comment->user_id;
                $comment->post_id  = $request['post_id']  ?? $comment->post_id;
            }

            $comment->save();

            return HandlerResponse::responseJSON([
                'message' => 'Comment Updated.',
            ]);
        } catch (\Throwable $th) {
            // throw $th;
            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
