<?php

namespace App\Http\Controllers;

use App\Models\Tb_kerja;
use Illuminate\Http\Request;

class TbKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Tb_kerja::all();
        return view('admin.jadwal_kerja.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.jadwal_kerja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    { 
         $jadwal = new Tb_kerja();
         $jadwal->jadwal = $request->jadwal;
         $jadwal->jam_masuk = $request->jam_masuk;
         $jadwal->jam_pulang = $request->jam_pulang;
         $jadwal->save();
         session()->put('success', 'Data Berhasil Di Tambah');
         return redirect('/admin/jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tb_kerja  $tb_kerja
     * @return \Illuminate\Http\Response
     */
    public function show(Tb_kerja $tb_kerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tb_kerja  $tb_kerja
     * @return \Illuminate\Http\Response
     */
    public function edit(Tb_kerja $tb_kerja)
    {
        $jadwal = Tb_kerja::findOrFail($id);
        return view('admin.halaman_kerja.index', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tb_kerja  $tb_kerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tb_kerja $tb_kerja, $id)
    {
        $jadwal = Tb_kerja::findOrFail($id);
        $jadwal->jadwal = $request->jadwal;
        $jadwal->jam_masuk = $request->jam_masuk;
        $jadwal->jam_pulang = $request->jam_pulang;
        $jadwal->save();
        session()->put('success', 'Data Berhasil Di Edit');
        return redirect('/admin/jadwal');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tb_kerja  $tb_kerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tb_kerja $tb_kerja, $id)
    {
        $jadwal = Tb_kerja::findOrFail($id);
        $jadwal->delete();
        session()->put('success', 'Data Berhasil dihapus');
        return redirect('/admin/jadwal');

    }
}
