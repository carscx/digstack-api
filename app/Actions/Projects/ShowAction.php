<?php

namespace App\Actions\Projects;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Project;

class ShowAction
{
    /**
     * Projects Show Action.
     *
     * @param  int $id
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(int $id)
    {
        try {
            $project = Project::find($id);

            if (!$project)
                return HandlerResponse::responseJSON([], 404);

            return HandlerResponse::responseJSON(['data' => $project]);
        } catch (\Throwable $th) {
            // throw $th;
            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
