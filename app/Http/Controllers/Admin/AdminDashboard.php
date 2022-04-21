<?php

namespace App\Http\Controllers\Admin;

use App\Charts\RequisitionChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventory as ModelsInventory;
use App\Models\Requisition as ModelsRequisition;
use App\Models\User;

class AdminDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RequisitionChart $chart)
    {
        $approve = ModelsRequisition::where('status', ModelsRequisition::STATUS_APRROVE)->count();
        $decline = ModelsRequisition::where('status', ModelsRequisition::STATUS_DECLINE)->count();
        $request =  ModelsRequisition::where('status', ModelsRequisition::STATUS_TO_RETURN)->count();
        return view('admin.dashboard', compact('approve', 'decline', 'request'), ['chart' => $chart->build()]);
    }
}
