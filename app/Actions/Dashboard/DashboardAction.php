<?php

namespace App\Actions\Dashboard;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardAction
{
    /**
     * Dashboard Action.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(Request $request)
    {
        try {
            $limit      = $request->query('limit', 1);
            $offset     = $request->query('offset', 0);
            $author_id  = $request->query('author_id');
            $start_date = $request->query('start_date', '1970-01-01');
            $end_date   = $request->query('end_date', '9999-12-31');

            $post = Post::limit($limit)
                ->orderBy('created_at', 'DESC')
                ->offset($offset)
                ->where('user_id', 'LIKE', $author_id)
                ->whereBetween('created_at', ["$start_date 00:00:00", "$end_date 23:59:59"])
                ->get();

            $project = Project::limit($limit)
                ->orderBy('created_at', 'DESC')
                ->offset($offset)
                ->where('user_id', 'LIKE', $author_id)
                ->whereBetween('created_at', ["$start_date 00:00:00", "$end_date 23:59:59"])
                ->get();

            $user = User::limit($limit)
                ->orderBy('created_at', 'DESC')
                ->offset($offset)
                ->where('role_id', '!=', '1')
                ->whereBetween('created_at', ["$start_date 00:00:00", "$end_date 23:59:59"])
                ->get();


            return HandlerResponse::responseJSON([
                'data' => [
                    'lastPost' => $post,
                    'lastProject' => $project,
                    'lastUser' => $user,
                ],
                'meta' => [
                    'limit'          => (int) $limit,
                    'offset'         => (int) $offset,
                    'filtered_total' => $post->count(),
                    'total'          => Post::where('user_id', 'LIKE', $author_id)->count()
                ]
            ]);
        } catch (\Throwable $th) {
            // throw $th;
            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
