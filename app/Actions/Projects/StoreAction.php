<?php

namespace App\Actions\Projects;

use App\Actions\Handlers\HandlerResponse;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreAction
{
    /**
     * Projects Store Action.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(Request $request)
    {
        try {
            $project = new Project();
            $project->user_id      = $request->user('sanctum')->id;
            $project->title        = $request['title'];
            $project->slug         = Str::slug($project->title, '-');
            $project->description  = $request['description'];

            if ($file = $request->file('image')) {
                $destinationPath = "images/";
                $final_location = $destinationPath . "/";
                $name = $file->getClientOriginalName();
                $path = $file->move($final_location, $file.'.'.$file->getClientOriginalExtension());
                $project->image = $file;
                $project->image_name = $name;
                $project->image_path= $path;
            }

            $project->save();

            return HandlerResponse::responseJSON([
                'message' => 'Proyecto Creado.'
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;

            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
