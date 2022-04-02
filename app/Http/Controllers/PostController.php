<?php

namespace App\Http\Controllers;

use App\Actions\Posts\DestroyAction;
use App\Actions\Posts\ShowAction;
use App\Actions\Posts\ShowAllAction;
use App\Actions\Posts\StoreAction;
use App\Actions\Posts\UpdateAction;
use App\Http\Requests\Posts\DestroyRequest;
use App\Http\Requests\Posts\ShowAllRequest;
use App\Http\Requests\Posts\ShowRequest;
use App\Http\Requests\Posts\StoreRequest;
use App\Http\Requests\Posts\UpdateRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Posts\ShowAllRequest $request
     * @return \App\Actions\Posts\ShowAllAction
     */
    public function index(ShowAllRequest $request)
    {
        return ShowAllAction::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Posts\StoreRequest  $request
     * @return \App\Actions\Posts\StoreAction
     */
    public function store(StoreRequest $request)
    {
        return StoreAction::execute($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\Posts\ShowRequest $request
     * @return \App\Actions\Posts\ShowAction
     */
    public function show($id, ShowRequest $request)
    {
        return ShowAction::execute($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\Posts\UpdateRequest $request
     * @return \App\Actions\Posts\UpdateAction
     */
    public function update($id, UpdateRequest $request)
    {
        return UpdateAction::execute($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\Posts\DestroyRequest $request
     * @return \App\Actions\Posts\DestroyAction
     */
    public function destroy($id, DestroyRequest $request)
    {
        return DestroyAction::execute($id);
    }
}
