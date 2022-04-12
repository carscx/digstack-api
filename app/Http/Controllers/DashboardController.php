<?php

namespace App\Http\Controllers;

use App\Actions\Dashboard\DashboardAction;
use App\Http\Requests\Dashboard\ShowAllRequest;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Dashboard\ShowAllRequest $request
     * @return \App\Actions\Dashboard\DashboardAction
     */
    public function index(ShowAllRequest $request)
    {
        return DashboardAction::execute($request);
    }
}
