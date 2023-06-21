<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DashboardBuku;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'books' => DashboardBuku::all(),
            'transaksi' => Transaksi::all()
        ]);
    }
}
