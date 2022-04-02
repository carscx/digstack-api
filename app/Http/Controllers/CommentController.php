<?php

namespace App\Http\Controllers;

use App\Actions\Comments\DestroyAction;
use App\Actions\Comments\ShowAction;
use App\Actions\Comments\ShowAllAction;
use App\Actions\Comments\StoreAction;
use App\Actions\Comments\UpdateAction;
use App\Http\Requests\Comments\DestroyRequest;
use App\Http\Requests\Comments\ShowAllRequest;
use App\Http\Requests\Comments\ShowRequest;
use App\Http\Requests\Comments\StoreRequest;
use App\Http\Requests\Comments\UpdateRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Comments\ShowAllRequest $request
     * @return \App\Actions\Comments\ShowAction
     */
    public function index(ShowAllRequest $request)
    {
        return ShowAllAction::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Comments\StoreRequest $request
     * @return \App\Actions\Comments\StoreAction
     */
    public function store(StoreRequest $request)
    {
        return StoreAction::execute($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\Comments\ShowRequest $request
     * @return \App\Actions\Comments\ShowAction
     */
    public function show($id, ShowRequest $request)
    {
        return ShowAction::execute($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\Comments\UpdateRequest $request
     * @return \App\Actions\Comments\UpdateAction
     */
    public function update($id, UpdateRequest $request)
    {
        return UpdateAction::execute($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\Comments\DestroyRequest $request
     * @return \App\Actions\Comments\DestroyAction
     */
    public function destroy($id, DestroyRequest $request)
    {
        return DestroyAction::execute($id);
    }
}
