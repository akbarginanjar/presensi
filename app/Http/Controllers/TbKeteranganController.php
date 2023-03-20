<?php

namespace App\Http\Controllers;

use App\Models\Tb_keterangan;
use Illuminate\Http\Request;

class TbKeteranganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $keterangan = Tb_keterangan::orderBy('created_at', 'desc')->get();
      return view('admin.user.keterangan.index', compact('keterangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwal = new Tb_keterangan();
        $jadwal->keterangan = $request->keterangan;
        $jadwal->save();
        session()->put('success', 'Data Berhasil Di Tambah');
        return redirect('/admin/keterangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tb_keterangan  $tb_keterangan
     * @return \Illuminate\Http\Response
     */
    public function show(Tb_keterangan $tb_keterangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tb_keterangan  $tb_keterangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tb_keterangan $tb_keterangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tb_keterangan  $tb_keterangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tb_keterangan $tb_keterangan,$id)
    {
        $jadwal = Tb_keterangan::findOrFail($id);
        $jadwal->keterangan = $request->keterangan;
        $jadwal->save();
        session()->put('success', 'Data Berhasil Di Tambah');
        return redirect('/admin/keterangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tb_keterangan  $tb_keterangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tb_keterangan $tb_keterangan, $id)
    {
        $jadwal = Tb_keterangan::findOrFail($id);
        $jadwal->delete();
        session()->put('success', 'Data Berhasil dihapus');
        return redirect('/admin/keterangan');
    }
}
