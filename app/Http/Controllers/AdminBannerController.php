<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title'   => 'Manajemen Banner',
            'banner'  => Banner::all(),  // Mengambil semua banner
            'content' => 'admin/banner/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title'   => 'Tambah Banner',
            'content' => 'admin/banner/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'headline' => 'required',
            'desc'     => 'required',
            'gambar'   => 'required|image|max:2048', // Validasi gambar
        ]);

        $data['urutan'] = 0; 

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time() . '-' . $gambar->getClientOriginalName();
            $storagePath = 'uploads/banners/';
            $gambar->move(public_path($storagePath), $file_name);
            $data['gambar'] = $storagePath . $file_name;
        }

        Banner::create($data);
        return redirect('/admin/banner')->with('success', 'Banner berhasil ditambahkan!'); // Pesan sukses
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id); // Menggunakan findOrFail untuk menangani kesalahan
        $data = [
            'title'   => 'Edit Banner',
            'banner'  => $banner,
            'content' => 'admin/banner/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id); // Menggunakan findOrFail untuk menangani kesalahan

        $data = $request->validate([
            'headline' => 'required',
            'desc'     => 'required',
            'gambar'   => 'nullable|image|max:2048', // Validasi gambar yang bersifat opsional
        ]);

        $data['urutan'] = 0; 

        // Upload gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($banner->gambar && file_exists(public_path($banner->gambar))) {
                unlink(public_path($banner->gambar)); // Menghapus gambar lama
            }

            $gambar = $request->file('gambar');
            $file_name = time() . '-' . $gambar->getClientOriginalName();
            $storagePath = 'uploads/banners/';
            $gambar->move(public_path($storagePath), $file_name);
            $data['gambar'] = $storagePath . $file_name; // Mengatur gambar baru
        } else {
            $data['gambar'] = $banner->gambar; // Menggunakan gambar lama jika tidak ada gambar baru
        }

        $banner->update($data);
        return redirect('/admin/banner')->with('success', 'Banner berhasil diperbarui!'); // Pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id); // Menggunakan findOrFail untuk menangani kesalahan

        // Hapus gambar dari disk jika ada
        if ($banner->gambar && file_exists(public_path($banner->gambar))) {
            unlink(public_path($banner->gambar)); // Menghapus gambar dari disk
        }

        $banner->delete();
        return redirect('/admin/banner')->with('success', 'Banner berhasil dihapus!'); // Pesan sukses
    }
}
