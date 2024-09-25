<?php

namespace App\Http\Controllers;

use App\Models\Blog; // Pastikan model Blog diimport
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all(); // Mendapatkan semua data blog

        return view('home.layouts.wrapper', [
            'blog' => $blogs,
            'content' => 'home/blog/index'
        ]);
    }

    public function show(string $id)
    {
        $blog = Blog::find($id); // Mengambil blog berdasarkan ID

        if (!$blog) {
            abort(404, 'Blog tidak ditemukan.');
        }

        return view('home.layouts.wrapper', [
            'blog' => $blog,
            'content' => 'home/blog/show'
        ]);
    }
}
