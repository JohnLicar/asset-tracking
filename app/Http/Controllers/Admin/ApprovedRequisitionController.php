<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requisition;
use App\Models\RequisitionItem;
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
        $requisitions = RequisitionItem::with(['requesition.approved.position', 'requesition.requested.position', 'unit'])->get();

        $signatures =
            [
                $requisitions[0]->requesition->requested->signature,
                $requisitions[0]->requesition->approved->signature,
                auth()->user()->signature
            ];

        foreach ($signatures as $index => $signature) {
            $path = public_path('images/signatures/' . $signature);
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = base64_encode(file_get_contents($path));

            $signatures[$index] =
                'data:image/' . $type . ';base64,' . $data;
        }

        return PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.pdf.pdf', ['requisitions' => $requisitions, 'image' => $signatures])->stream();
    }

    public function approved()
    {

        $requisitions = Requisition::with('request.unit', 'approved')
            ->whereRelation('request', 'requested_by', auth()->id())
            ->paginate(10);

        return view('client.requisition.index', compact('requisitions'));
    }
}
