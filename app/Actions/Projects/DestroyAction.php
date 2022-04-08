<?php

namespace App\Actions\Projects;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Project;

class DestroyAction
{
    /**
     * Projects Destroy Action
     * Disable Project
     *
     * @param  int  $id
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute($id)
    {
        try {
            $project = Project::find($id);
            if (!$project)
                return HandlerResponse::responseJSON([
                    'message' => 'Project ID Not Found.'
                ], 404);

            $project->status = '0';
            $project->save();

            return HandlerResponse::responseJSON([
                'message' => 'Project Disabled.',
            ]);
        } catch (\Throwable $th) {
            //throw $th;

            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
