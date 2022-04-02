<?php

namespace App\Actions\Posts;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Post;

class ShowAction
{
    /**
     * Posts Show Action.
     *
     * @param  int $id
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(int $id)
    {
        try {
            $post = Post::find($id);

            if (!$post)
                return HandlerResponse::responseJSON([], 404);

            return HandlerResponse::responseJSON(['data' => $post]);
        } catch (\Throwable $th) {
            // throw $th;
            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
