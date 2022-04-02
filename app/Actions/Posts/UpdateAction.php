<?php

namespace App\Actions\Posts;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UpdateAction
{
    /**
     * Posts Update Action.
     * 
     * @param  int  $id
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute($id, Request $request)
    {
        try {
            $post = Post::find($id);
            if (!$post)
                return HandlerResponse::responseJSON([
                    'message' => 'Post ID Not Found.'
                ], 404);

            $post->title        = $request['title']         ?? $post->title;
            $post->description  = $request['description']   ?? $post->description;

            if (!empty($request['title']))
                $post->slug     = Str::slug($post->title, '-');

            if ($request->user('sanctum')->tokenCan('*'))
                $post->user_id  = $request['user_id']       ?? $post->user_id;

            $post->save();

            return HandlerResponse::responseJSON([
                'message' => 'Post Updated.',
            ]);
        } catch (\Throwable $th) {
            //throw $th;

            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
