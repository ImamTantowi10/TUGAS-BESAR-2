<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Support\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\BarChart;
use Illuminate\Support\Facades\Auth;

class pert2controller extends Controller
{
    public function TampilPert2()
    {
        // Apakah user adalah admin
        $isAdmin = Auth::user()->role === 'admin';

        // Ambil produk dari database dan kelompokkan berdasarkan tanggal
        $produkPerHariQuery = Produk::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        if (!$isAdmin){
            $produkPerHariQuery->where('user_id', Auth::id());
        }

        // Memisahkan data untuk grafik
        $dates = [];
        $totals = [];

        foreach ($produkPerHariQuery as $item) {
            $dates[] = Carbon::parse($item->date)->format('Y-m-d'); // Format tanggal
            $totals[] = $item->total;
        }

        // Membuat grafik menggunakan data yang diambil
        $chart = LarapexChart::barChart()
            ->setTitle('Produk Ditambahkan Per Hari')
            ->setSubtitle('Data Penambahan Produk Harian')
            ->addData('Jumlah Produk', $totals)
            ->setXAxis($dates);

        $totalProdcutQuery = Produk::query();
        if (!$isAdmin){
            $totalProdcutQuery->where('user_id', Auth::id());
        }

        // Data tambahan untuk view
        $data = [
            'totalProducts' => Produk::count(), // Total produk
            'salesToday' => 130, // Contoh data lainnya
            'totalRevenue' => 'Rp 75,000,000',
            'registeredUsers' => 350,
            'chart' => $chart // Pass chart ke view
        ];
        return view('pert2', $data);
    }
}
