<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardBuku;
use Illuminate\Support\Facades\Storage;

class DashboardBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.buku.index', [
            'title' => 'Dashboard Buku',
            'books' => DashboardBuku::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.buku.create', [
            'title' => 'Create Buku'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // ddd($request);
        // return $request->file('image')->store('cover-images');
        $result = $request->validate([
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'image' => 'image|file|max:1024',
            'harga' => 'required'
        ]);

        if($request->file('image')) {
            $result['image'] = $request->file('image')->store('cover-images');
        }

        DashboardBuku::create($result);

        return redirect('/dashboard/buku')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(DashboardBuku $dashboardBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashboardBuku $buku)
    {
        return view('dashboard.buku.edit', [
            'title' => 'Edit buku',
            'books' => $buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DashboardBuku $buku)
    {
        $result = $request->validate([
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'image' => 'image|file|max:1024',
            'harga' => 'required'
        ]);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $result['image'] = $request->file('image')->store('cover-images');
        }

        DashboardBuku::where('id_buku', $buku->id_buku)->update($result);

        return redirect('/dashboard/buku')->with('success', 'Data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashboardBuku $buku)
    {
        if($buku->image) {
            Storage::delete($buku->image);
        }
        DashboardBuku::destroy($buku->id_buku);

        return redirect('/dashboard/buku')->with('success','Data berhasil di hapus');
    }
}
