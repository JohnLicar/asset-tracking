<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class IssuedChart
{
    protected $chart;
    protected $year;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($year = ""): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // $reports = User::has('issued')
        //     ->withCount('issued')
        //     // ->when($year, function ($query) use ($year) {
        //     //     return $query->whereYear('created_at', $year);
        //     // })
        //     ->get();
        $year == "" ? $this->year = null : $this->year = $year;
        $reports = User::query()
            ->whereHas('issued', function ($q) use ($year) {
                $q->when($this->year, function ($query) use ($year) {
                    return $query->whereYear('created_at', $year);
                });
            })
            ->withCount(['issued' => function ($q) use ($year) {
                $q->when($this->year, function ($query) use ($year) {
                    return $query->whereYear('created_at', $year);
                });
            }])
            ->get();

        return $this->chart->barChart()
            ->setTitle('Client with most Issued item')
            ->addData('', $reports->pluck('issued_count')->all())
            ->setColors(['#00E396'])
            ->setXAxis($reports->pluck('full_name')->all());
    }
}
