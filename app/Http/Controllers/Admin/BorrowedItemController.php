<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requisition;
use Illuminate\Http\Request;

class BorrowedItemController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        // $requisitions = Requisition::with(['unit', 'requested', 'approved'])
        // ->where('status', 2)
        // ->paginate(10);

        $requisitions = Requisition::with(['notCosumableUnit', 'requested', 'approved'])
            ->where('status', 5)

            ->paginate(10);

        // dd($requisitions);
        return view('admin.borrowed-item.index', compact('requisitions'));
    }
}
