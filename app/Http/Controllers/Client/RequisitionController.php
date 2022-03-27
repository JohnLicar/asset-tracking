<?php

namespace App\Http\Controllers\Client;

use App\Models\Requisition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventory;

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
        return view('client.requisition.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Requisition::create($request->all());
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
        ->where('status', 2)
        ->paginate(10);

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
        $item = Inventory::find($requisition->inventory_id);

        $item->update([
            'quantity' => ($item->quantity + $requisition->quantity)
        ]);

        $requisition->delete();
        toast('Item returned successfully', 'success');
        return redirect()->route('admin-return');
    }
}
