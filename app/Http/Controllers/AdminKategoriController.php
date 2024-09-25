<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua kategori
        $data = [
            'title'   => 'Manajemen Kategori',
            'kategori' => Kategori::get(),
            'content' => 'admin/kategori/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form tambah kategori
        $data = [
            'title'  => 'Tambah Kategori',
            'content' => 'admin/kategori/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'name'      => 'required',
        ]);

        // Simpan data ke database
        Kategori::create($data);

        return redirect('/admin/posts/kategori')->with('success', 'kategori berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form edit kategori
        $data = [
            'title'     => 'Edit Kategori',
            'kategori'   => Kategori::find($id),
            'content'   => 'admin/kategori/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::find($id);
        $data = $request->validate([
            'name'      => 'required',
        ]);

        // Update data kategori
        $kategori->update($data);

        return redirect('/admin/posts/kategori')->with('success', 'kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus kategori
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect('/admin/posts/kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}
