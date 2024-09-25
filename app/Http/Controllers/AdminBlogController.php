<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminBlogController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Manajemen Blog',
            'blog' => Blog::with('kategori')->get(),
            'content' => 'admin/blog/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data',
            'kategori' => Kategori::get(),
            'content' => 'admin/blog/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'kategori_id' => 'required',
            'body' => 'required',
            'cover' => 'required|image',
        ]);

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $file_name = time() . '-' . $cover->getClientOriginalName();
            $storage = 'uploads/blogs/';
            $cover->move(public_path($storage), $file_name);
            $data['cover'] = $storage . $file_name;
        }

        Blog::create($data);
        return redirect('/admin/posts/blog');
    }

    public function show(string $id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return redirect('/admin/posts/blog')->with('error', 'Blog tidak ditemukan.');
        }
        
        $data = [
            'title' => 'Edit Blog',
            'blog' => $blog,
            'content' => 'admin/blog/show'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return redirect('/admin/posts/blog')->with('error', 'Blog tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Blog',
            'blog' => $blog,
            'kategori' => Kategori::get(),
            'content' => 'admin/blog/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return redirect('/admin/posts/blog')->with('error', 'Blog tidak ditemukan.');
        }

        $data = $request->validate([
            'title' => 'required',
            'kategori_id' => 'required',
            'body' => 'required',
        ]);

        if ($request->hasFile('cover')) {
            if ($blog->cover != null) {
                unlink(public_path($blog->cover));
            }

            $cover = $request->file('cover');
            $file_name = time() . '-' . $cover->getClientOriginalName();
            $storage = 'uploads/blogs/';
            $cover->move(public_path($storage), $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            $data['cover'] = $blog->cover;
        }

        $blog->update($data);
        return redirect('/admin/posts/blog');
    }

    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return redirect('/admin/posts/blog')->with('error', 'Blog tidak ditemukan.');
        }

        if ($blog->cover != null) {
            unlink(public_path($blog->cover));
        }
        $blog->delete();
        return redirect('/admin/posts/blog');
    }
}
