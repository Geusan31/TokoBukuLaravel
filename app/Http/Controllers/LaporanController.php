<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index() {
        return view('dashboard.laporan.index', [
            'title' => 'Laporan',
            'transaksi' => Transaksi::where('id_user', auth()->user()->id)->get()
        ]);
    }

    public function cetak() {
        $pdf = Pdf::loadView('dashboard.laporan.pdf.index', [
            'transaksi' => Transaksi::where('id_user', auth()->user()->id)->get()
        ]);
        return $pdf->download('laporan.pdf');
    }
}
