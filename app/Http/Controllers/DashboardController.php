<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Surat;
use App\Models\Template;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_penduduk' => Penduduk::count(),
            'surat_hari_ini' => Surat::whereDate('created_at', Carbon::today())->count(),
            'surat_bulan_ini' => Surat::whereMonth('created_at', Carbon::now()->month)->count(),
            'total_template' => Template::count(),
            'total_arsip' => Surat::count(),
        ];

        // Chart Data: Surat per Bulan (Last 6 Months)
        $chartData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $chartData[] = [
                'month' => $month->translatedFormat('F'),
                'count' => Surat::whereYear('created_at', $month->year)
                    ->whereMonth('created_at', $month->month)
                    ->count(),
            ];
        }

        return view('dashboard', compact('stats', 'chartData'));
    }
}
