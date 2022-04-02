<?php

namespace App\Actions\Posts;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Post;

class DestroyAction
{
    /**
     * Posts Destroy Action
     * Disable Post
     * 
     * @param  int  $id
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute($id)
    {
        try {
            $post = Post::find($id);
            if (!$post)
                return HandlerResponse::responseJSON([
                    'message' => 'Post ID Not Found.'
                ], 404);

            $post->status = '0';
            $post->save();

            return HandlerResponse::responseJSON([
                'message' => 'Post Disabled.',
            ]);
        } catch (\Throwable $th) {
            //throw $th;

            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
