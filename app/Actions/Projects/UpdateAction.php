<?php

namespace App\Actions\Projects;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UpdateAction
{
    /**
     * Projects Update Action.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute($id, Request $request)
    {
        try {
            $project = Project::find($id);
            if (!$project)
                return HandlerResponse::responseJSON([
                    'message' => 'Project ID Not Found.'
                ], 404);

            $project->title        = $request['title']         ?? $project->title;
            $project->description  = $request['description']   ?? $project->description;

            if ($file = $request->file('image')) {
                $destinationPath = "images/";
                $final_location = $destinationPath . "/";
                $name = $file->getClientOriginalName();
                $path = $file->move($final_location, $file.'.'.$file->getClientOriginalExtension());
                $project->image = $file;
                $project->image_name = $name;
                $project->image_path= $path;
            }

            if (!empty($request['title']))
                $project->slug     = Str::slug($project->title, '-');

            if ($request->user('sanctum')->tokenCan('*'))
                $project->user_id  = $request['user_id']       ?? $project->user_id;

            $project->save();

            return HandlerResponse::responseJSON([
                'message' => 'Project Updated.',
            ]);
        } catch (\Throwable $th) {
            //throw $th;

            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
