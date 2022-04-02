<?php

namespace App\Http\Controllers;

use App\Actions\Users\DestroyAction;
use App\Actions\Users\ShowAction;
use App\Actions\Users\ShowAllAction;
use App\Actions\Users\StoreAction;
use App\Actions\Users\UpdateAction;
use App\Http\Requests\Users\DestroyRequest;
use App\Http\Requests\Users\ShowAllRequest;
use App\Http\Requests\Users\ShowRequest;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Users\ShowAllRequest $request
     * @return \App\Actions\Users\ShowAction
     */
    public function index(ShowAllRequest $request)
    {
        return ShowAllAction::execute($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Users\StoreRequest $request
     * @return \App\Actions\Users\StoreAction
     */
    public function store(StoreRequest $request)
    {
        return StoreAction::execute($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\Users\ShowRequest $request
     * @return \App\Actions\Users\ShowAction
     */
    public function show($id, ShowRequest $request)
    {
        return ShowAction::execute($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\Users\UpdateRequest $request
     * @return \App\Actions\Users\UpdateAction
     */
    public function update($id, UpdateRequest $request)
    {
        return UpdateAction::execute($id, $request);
    }

    /**
     * Disable the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\Users\DestroyRequest $request
     * @return \App\Actions\Users\DestroyAction
     */
    public function destroy($id, DestroyRequest $request)
    {
        return DestroyAction::execute($id);
    }
}
