<?php

namespace App\Actions\Projects;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Project;
use Illuminate\Http\Request;

class ShowAllAction
{
    /**
     * Projects Show All Action.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(Request $request)
    {
        try {
            $limit      = $request->query('limit', 100);
            $offset     = $request->query('offset', 0);
            $author_id  = $request->query('author_id');
            $start_date = $request->query('start_date', '1970-01-01');
            $end_date   = $request->query('end_date', '9999-12-31');

            $project = Project::limit($limit)
                ->offset($offset)
                ->where('user_id', 'LIKE', $author_id)
                ->whereBetween('created_at', ["$start_date 00:00:00", "$end_date 23:59:59"])
                ->get();

            return HandlerResponse::responseJSON([
                'data' => $project,
                'meta' => [
                    'limit'          => (int) $limit,
                    'offset'         => (int) $offset,
                    'filtered_total' => $project->count(),
                    'total'          => Project::where('user_id', 'LIKE', $author_id)->count()
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
