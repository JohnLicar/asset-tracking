<?php

namespace App\Http\Controllers\Client;

use App\Models\Requisition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestisitonRequest;
use App\Models\Inventory;
use App\Models\RequisitionItem;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.requisitions.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approveReturn()
    {
        return view('admin.returning-item.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Inventory $item)
    {
        if (!auth()->user()->signature) {
            toast('Please add Signature first', 'error');
            return redirect()->route('cdashboard');
        }
        return view('client.requisition.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestisitonRequest $request)
    {
        $request_id =  Requisition::create($request->all());
        foreach ($request->items as $item) {
            RequisitionItem::create([
                'requisition_id' => $request_id->id,
                'inventory_id' => $item['inventory_id'],
                'quantity' => $item['quantity']
            ]);
        }
        return redirect()->route('dashboard');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function toBeReturn()
    {

        $items = Requisition::with(['unit', 'requested', 'approved'])
            ->where('requested_by', auth()->id())
            ->whereRelation('unit', 'isConsumable', 0)
            ->whereIn('status', [2, 4])

            ->paginate(10);
        // dd($items);

        return view('client.requisition.to_be_return', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function updateToReturn(Requisition $requisition)
    {
        $requisition->update([
            'status' => 4
        ]);

        return redirect()->route('toBeReturn');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $requisition)
    {
        $items = RequisitionItem::with('requester', 'unit', 'requesition.approved')->inventory($requisition->id)
            ->whereRelation('unit', 'isConsumable', 0)
            ->get();

        foreach ($items as $item) {
            $item->unit->update([
                'quantity' => ($item->unit->quantity + $item->quantity)
            ]);
        }

        $requisition->delete();
        toast('Item returned successfully', 'success');
        return redirect()->route('admin-return');
    }
}
