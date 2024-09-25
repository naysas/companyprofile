<?php

namespace App\Http\Controllers;

use App\Models\Pesan; // Pastikan model Pesan diimport
use Illuminate\Http\Request;

class HomeContactController extends Controller
{
    public function index()
    {
        $data = [
            'content' => 'home/contact/index'
        ];

        return view('home.layouts.wrapper', $data);
    }

    public function send(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required'
        ]);

        // Simpan pesan ke database
        Pesan::create($data);

        // Redirect dengan pesan sukses
        return redirect('/contact')->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
