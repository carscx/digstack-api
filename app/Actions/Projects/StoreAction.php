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
            // $project->image        = $request->file('image');
            $project->description  = $request['description'];

            if ($file = $request->file('image')) {
                $destinationPath = "images/";

                $final_location = $destinationPath . "/";
                $name = $file->getClientOriginalName();
                // $path = $file->move($final_location, Str::replace($file->getClientOriginalExtension(), '', Str::replace('.', $name, '')).'-'. time().'.'.$file->getClientOriginalExtension());
                $path = $file->move($final_location, $file.'.'.$file->getClientOriginalExtension());

                //store your file into directory and db
                // $save = new File();
                $project->image = $file;
                $project->image_name = $name;
                $project->image_path= $path;

                // error_log('Some message here.');
                // if (!is_dir($destinationPath)) {
                //     mkdir($destinationPath, 0777, true);
                // }

                // error_log($request->file('image'));
                // $request->file('image')
                // ->move($final_location, 'filename'.'.'. $request->file('image')
                // ->getClientOriginalExtension());
            }

            // foreach($request->image as $mediaFiles) {
            //     $path = $mediaFiles->store('public/images');
            //     $name = $mediaFiles->getClientOriginalName();
            //     $project->image_name = $name;
            //     $project->image_path = $path;
            //     $project->save();
            // }

            $project->save();

            return HandlerResponse::responseJSON([
                'message' => 'Project Created.'
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;

            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
