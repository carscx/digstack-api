<?php

namespace App\Actions\Comments;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Comment;

class DestroyAction
{
    /**
     * Comments Destroy Action
     * Disable Post
     *
     * @param  int  $id
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute($id)
    {
        try {

            $comment = Comment::find($id);
            if (!$comment)
                return HandlerResponse::responseJSON([
                    'message' => 'Comment ID Not Found.'
                ], 404);

            $comment->status = '0';
            $comment->save();

            return HandlerResponse::responseJSON([
                'message' => 'Comment Disabled.',
            ]);
        } catch (\Throwable $th) {
            // throw $th;
            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
