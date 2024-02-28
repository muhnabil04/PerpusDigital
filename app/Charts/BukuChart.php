<?php

namespace App\Charts;

use App\Models\peminjaman;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class BukuChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }
    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');

        $dataBulan = [];
        $chartData = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthlyData = Peminjaman::whereYear('tanggal_peminjaman', $tahun)
                ->whereMonth('tanggal_peminjaman', $i)
                ->count();

            $dataBulan[] = Carbon::createFromDate($tahun, $i, 1)->format('F');
            $chartData[] = $monthlyData;
        }

        return $this->chart->lineChart()
            ->setTitle('Grafik Peminjaman Perbulan')
            ->setSubtitle('Grafik Peminjaman.')
            ->addData('Peminjaman', $chartData)
            ->setHeight(278)
            ->setXAxis($dataBulan);
    }
}
