<?php

namespace App\Http\Livewire;

use App\Charts\IssuedChart;
use App\Charts\ReportChart;
use App\Models\Requisition;
use Livewire\Component;

class RequestChart extends Component
{
    public $year = "";

    public function render(ReportChart $reportChart)
    {
        $years = Requisition::query()
            ->withTrashed()
            ->selectRaw('YEAR(created_at) as year')
            ->groupBy('year')
            ->get()
            ->pluck('year')
            ->toArray();

        return view('livewire.request-chart', compact('years'), ['reportChart' => $reportChart->build($this->year)]);
    }
}
