<?php

namespace App\Charts;

use App\Models\Requisition;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RequisitionChart
{
    protected $chart;
    protected $approve = [0];
    protected $decline = [0];
    protected $label = [];
    

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {

        $Approvedatas =   Requisition::select(
            // DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as "count"'),
            DB::raw('Date(created_at) as date')
        )->where('status', 2)
            ->groupBy('date')
            ->get();

            $Declinedatas =   Requisition::select(
                DB::raw('COUNT(*) as "count"'),
                DB::raw('Date(created_at) as date')
            )->where('status', 3)
                ->groupBy('date')
                ->get();


                foreach ($Approvedatas as $index => $data) {

                    $this->label[$index] = Carbon::parse($data['date'])->format('d M Y');
                    $this->approve[$index] = $data['count'];
                }

                foreach ($Declinedatas as $index => $data) {

                    $this->label[$index] = Carbon::parse($data['date'])->format('d M Y');
                    $this->decline[$index] = $data['count'];
                }
        
        return $this->chart->lineChart()
            ->setTitle('Volume of requisition per Month')
            ->setHeight(280)
            ->setSubtitle('Approve and Decline')
            ->addData('Approve', $this->approve)
            ->addData('Decline', $this->decline)
            ->setColors(['#00FF00', '#ff6384'])
            ->setXAxis($this->label)
            ->setGrid();
    }
}
