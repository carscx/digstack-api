<?php

namespace App\Actions\Posts;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreAction
{
    /**
     * Posts Store Action.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(Request $request)
    {
        try {
            $post = new Post();
            $post->user_id      = $request->user('sanctum')->id;
            $post->title        = $request['title'];
            $post->slug         = Str::slug($post->title, '-');
            $post->description  = $request['description'];

            $post->save();

            return HandlerResponse::responseJSON([
                'message' => 'Post Created.'
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;

            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
