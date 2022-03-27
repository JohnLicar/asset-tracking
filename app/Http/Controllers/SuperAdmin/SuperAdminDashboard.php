<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Charts\RequisitionChart;
use App\Http\Controllers\Controller;
use App\Models\Requisition;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RequisitionChart $chart)
    {
        $user = User::count();
        $pending = Requisition::where('status', Requisition::STATUS_PENDING)->count();
        return view('dashboard', compact('user', 'pending'), ['chart' => $chart->build()]);
    }
}
