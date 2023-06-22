<?php

namespace App\Charts;

use App\Models\Assets;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class CategoryChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $categoryChart = Assets::get();
        $data = [
            $categoryChart->where('category_id',1)->count(),
            $categoryChart->where('category_id',2)->count(),
            $categoryChart->where('category_id',3)->count(),
            $categoryChart->where('category_id',4)->count(),
            $categoryChart->where('category_id',5)->count(),
            $categoryChart->where('category_id',6)->count(),
            $categoryChart->where('category_id',7)->count(),
        ];

        $label = [
            'Access Point',
            'Router',
            'Switch',
            'Wireless Controller',
            'Ethernet Switch',
            'Network Access Controller',
        ];
        return $this->chart->donutChart()
            // ->setTitle('Data Category')
            ->addData($data)
            ->setLabels($label);

    }
}
