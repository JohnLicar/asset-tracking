<?php

namespace App\Http\Controllers\Client;

use App\Charts\BorrowChart;
use App\Charts\RequisitionChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Requisition;

class ClientDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BorrowChart $chart)
    {
        $approve = Requisition::where('requested_by', auth()->id())
            ->where('status', Requisition::STATUS_APRROVE)->count();
        $decline = Requisition::where('requested_by', auth()->id())
            ->where('status', Requisition::STATUS_DECLINE)->count();
        $request =  Requisition::where('requested_by', auth()->id())
            ->where('status', Requisition::STATUS_PENDING)->count();
        return view('admin.dashboard', compact('approve', 'decline', 'request'), ['chart' => $chart->build()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
