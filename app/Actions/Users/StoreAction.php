<?php

namespace App\Actions\Users;

use App\Actions\Handlers\HandlerResponse;
use Illuminate\Http\Request;

class StoreAction
{
    /**
     * Users Store Action.
     * This Method Not Allowed
     * -----------------------
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(Request $request)
    {
        return HandlerResponse::responseJSON([], 405);
    }
}
