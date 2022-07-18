<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ReportChart
{
    protected $chart;
    protected $year;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($year = ""): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $year == "" ? $this->year = null : $this->year = $year;

        // $reports = User::query()
        //     ->whereHas('request',  function ($q) use ($year) {
        //         $q->whereYear('created_at', $year);
        //     })
        //     ->withCount(['request' => function ($q) use ($year) {
        //         $q->whereYear('created_at', $year);
        //     }])
        //     ->get();

        $reports = User::query()
            ->whereHas('request', function ($q) use ($year) {
                $q->when($this->year, function ($query) use ($year) {
                    return $query->whereYear('created_at', $year);
                });
            })
            ->withCount(['request' => function ($q) use ($year) {
                $q->when($this->year, function ($query) use ($year) {
                    return $query->whereYear('created_at', $year);
                });
            }])
            ->get();

        return $this->chart->barChart()
            ->setTitle('Client with most request')
            ->setSubtitle('Wins during season 2021.')
            ->addData('', $reports->pluck('request_count')->all())
            ->setXAxis($reports->pluck('full_name')->all());
    }
}
