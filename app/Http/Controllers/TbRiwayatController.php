<?php

namespace App\Http\Controllers;

use App\Models\Tb_riwayat;
use Illuminate\Http\Request;

class TbRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat = Tb_riwayat::all();
        return view('admin.user.riwayat.index', compact('riwayat'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tb_riwayat  $tb_riwayat
     * @return \Illuminate\Http\Response
     */
    public function show(Tb_riwayat $tb_riwayat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tb_riwayat  $tb_riwayat
     * @return \Illuminate\Http\Response
     */
    public function edit(Tb_riwayat $tb_riwayat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tb_riwayat  $tb_riwayat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tb_riwayat $tb_riwayat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tb_riwayat  $tb_riwayat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tb_riwayat $tb_riwayat)
    {
        //
    }
}
