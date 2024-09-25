<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class AdminPesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'   => 'Manajemen Pesan',
            'pesan' => Pesan::orderBy('created_at','desc')->get(),
            'content' => 'admin/pesan/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        Pesan::create($data);
        return redirect('/admin/pesan')->with('success', 'Pesan berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $pesan = Pesan::find($id);
        $pesan->is_read = 1;
        $pesan->save();

        $data = [
            'title'   => 'Manajemen Pesan',
            'pesan' => Pesan::find($id),
            'content' => 'admin/pesan/show'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        $pesan = Pesan::find($id);
        if ($pesan) {
            $pesan->update($data);
            return redirect('/admin/pesan')->with('success', 'Pesan berhasil diperbarui!');
        } else {
            return redirect('/admin/pesan')->with('error', 'Pesan tidak ditemukan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesan = Pesan::find($id);

        if ($pesan) {
            $pesan->delete();
            return redirect('/admin/pesan')->with('success', 'Pesan berhasil dihapus!');
        } else {
            return redirect('/admin/pesan')->with('error', 'Pesan tidak ditemukan!');
        }
    }
}
