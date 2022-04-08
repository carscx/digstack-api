<?php

namespace App\Http\Controllers;

use App\Actions\Projects\DestroyAction;
use App\Actions\Projects\ShowAction;
use App\Actions\Projects\ShowAllAction;
use App\Actions\Projects\StoreAction;
use App\Actions\Projects\UpdateAction;
use App\Http\Requests\Projects\DestroyRequest;
use App\Http\Requests\Projects\ShowAllRequest;
use App\Http\Requests\Projects\ShowRequest;
use App\Http\Requests\Projects\StoreRequest;
use App\Http\Requests\Projects\UpdateRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Projects\ShowAllRequest $request
     * @return \App\Actions\Projects\ShowAllAction
     */
    public function index(ShowAllRequest $request)
    {
        return ShowAllAction::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Projects\StoreRequest  $request
     * @return \App\Actions\Projects\StoreAction
     */
    public function store(StoreRequest $request)
    {
        return StoreAction::execute($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\Projects\ShowRequest $request
     * @return \App\Actions\Projects\ShowAction
     */
    public function show($id, ShowRequest $request)
    {
        return ShowAction::execute($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\Projects\UpdateRequest $request
     * @return \App\Actions\Projects\UpdateAction
     */
    public function update($id, UpdateRequest $request)
    {
        return UpdateAction::execute($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\Projects\DestroyRequest $request
     * @return \App\Actions\Projects\DestroyAction
     */
    public function destroy($id, DestroyRequest $request)
    {
        return DestroyAction::execute($id);
    }
}
