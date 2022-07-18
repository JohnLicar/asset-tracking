<?php

namespace App\Http\Livewire;

use App\Charts\IssuedChart;
use App\Charts\ReportChart;
use App\Models\Requisition;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class ReportTable extends Component
{
    use WithPagination;

    public function render()
    {

        $reports = User::has('request')
            ->withCount('request')
            ->withCount('pending')
            ->withCount('approve')
            ->withCount('decline')
            ->withCount('returned')
            ->withCount('issued')
            ->get();

        return view('livewire.report-table', compact('reports'));
    }
}
