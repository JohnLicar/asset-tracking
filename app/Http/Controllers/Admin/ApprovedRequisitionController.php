<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QrCode;
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
    public function create(Requisition $requisition)
    {

        $requisitions = RequisitionItem::with(['requesition.approved.position', 'requesition.requested.position', 'unit'])
            ->where('requisition_id', $requisition->id)
            ->get();

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

    public function issue(Request $request, Requisition $requisition)
    {

        $requisitionItem =  RequisitionItem::where('requisition_id', $requisition->id)->get();

        foreach ($requisitionItem as $item) {
            foreach ($request->qr_code[$item->inventory_id] as $index => $qr_code) {
                QrCode::where('id', $qr_code)->update(['status' => 1]);
                if ($index == 0) {
                    $item->update([
                        'qr_code_id' => $qr_code,
                    ]);
                    // dd($request->qr_code[$item->inventory_id], $request->qr_code);
                }

                if ($index > 0) {
                    RequisitionItem::create([
                        'requisition_id' => $item->requisition_id,
                        'inventory_id' => $item->inventory_id,
                        'quantity' => $item->quantity,
                        'qr_code_id' => $qr_code,
                    ]);
                }
            }
        }


        $requisition->update([
            'status' => Requisition::STATUS_TO_ISSUED,
            'issued_by' => auth()->id(),
            'issued_date' => now(),
        ]);
        toast('Item issued successfully', 'success');
        return redirect()->route('approved-requisition.index');
    }

    public function approved()
    {

        $requisitions = Requisition::with('request.unit', 'approved')
            ->whereRelation('request', 'requested_by', auth()->id())
            ->paginate(10);

        return view('client.requisition.index', compact('requisitions'));
    }

    public function detail(
        Request $request,
        $requisitionItem
    ) {

        $item = QrCode::with('requesition.requested', 'unit')->whereRelation('requesition', 'requisition_id', $requisitionItem)->get();
        $ip = $request->ip();
        // dd($item[0]->requesition);
        return view('admin.borrowed-item.show', compact('item', 'ip'));
    }
}
