<?php

namespace App\Http\Controllers;

use App\Models\DashboardBuku;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.transaksi.index', [
            'title' => 'Transaksi',
            'transaksi' => Transaksi::where('id_user',auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.transaksi.create', [
            'title' => 'Transaksi',
            'books' => DashboardBuku::all(  )
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            'id_buku' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
        ]);

        $result['id_user'] = auth()->user()->id;

        Transaksi::create($result);

        return redirect('/dashboard/transaksi')->with('success', 'Data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id = null)
    {
        $model = DashboardBuku::all();
        $data = $model->find($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        return view('dashboard.transaksi.edit', [
            'title' => 'Transaksi',
            'transaksi' => $transaksi,
            'books' => DashboardBuku::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $result = $request->validate([
            'id_buku' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
        ]);

        $result['id_user'] = auth()->user()->id;

        Transaksi::where('id_transaksi', $transaksi->id_transaksi)->update($result);

        return redirect('/dashboard/transaksi')->with('success', 'Data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        Transaksi::destroy($transaksi->id_transaksi);

        return redirect('/dashboard/transaksi')->with('success', 'Data berhasil di hapus');
    }
}
