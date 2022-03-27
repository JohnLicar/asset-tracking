<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class RequisitionChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle('Volume of requisition per Month')
            ->setHeight(280)
            ->setSubtitle('Approve and Decline')
            ->addData('Approve', [40, 93, 35, 42, 18, 82])
            ->addData('Decline', [70, 29, 77, 28, 55, 45])
            ->setColors(['#00FF00', '#ff6384'])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June'])
            ->setGrid();
    }
}
