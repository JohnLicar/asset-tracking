<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requisition;
use Illuminate\Http\Request;

class DeclineRequisitionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $items = Requisition::with(['unit', 'requested', 'approved'])
        ->where('status', 3)
        ->paginate(10);

        return view('admin.requisition.declined-requisition', compact('items'));
    }
}
