<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requisition;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class ApprovedRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.requisition.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requisitions = Requisition::with(['unit', 'requested', 'approved'])
        ->where('status', 2)
        ->get();

      
        view()->share('requisitions', $requisitions);

        $pdf = PDF::loadView('admin.pdf.pdf');
        return $pdf->stream();

    }

    public function approved(){
        $requisitions = Requisition::with(['unit', 'requested', 'approved'])
        ->where('requested_by', auth()->id())
        ->paginate(10);
   
        return view('client.requisition.index', compact('requisitions'));
    }
}
