<?php

namespace App\Http\Livewire;

use App\Charts\IssuedChart as ChartsIssuedChart;
use App\Models\Requisition;
use Livewire\Component;

class IssuedChart extends Component
{
    public $year = "";

    public function render(ChartsIssuedChart $issuedChart)
    {
        $years = Requisition::query()
            ->withTrashed()
            ->selectRaw('YEAR(created_at) as year')
            ->groupBy('year')
            ->get()
            ->pluck('year')
            ->toArray();

        return view('livewire.issued-chart', compact('years'), ['issuedChart' => $issuedChart->build($this->year)]);
    }
}
