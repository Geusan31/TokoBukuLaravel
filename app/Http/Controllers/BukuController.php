<?php

namespace App\Http\Controllers;

use App\Models\DashboardBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index() {

        return view('depan.buku', [
            'title' => 'Daftar Buku',
            'books' => DashboardBuku::filter(request('search'))->latest()->get()
        ]);
    }
}
