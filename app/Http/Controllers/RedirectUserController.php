<?php

namespace App\Http\Controllers;

class RedirectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isAn('superadministrator')) return redirect()->route('sdashboard');

        if (auth()->user()->isAn('client')) return redirect()->route('cdashboard');

        if (auth()->user()->isAn('administrator')) return redirect()->route('adashboard');
    }
}
