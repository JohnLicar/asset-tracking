<?php

namespace App\Http\Controllers;

use App\Models\Requisition;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('log');
    }
}
