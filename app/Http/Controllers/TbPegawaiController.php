<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Tb_pengguna;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tb_pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TbPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $pegawai = TB_pegawai::all();
       
       

        return view('admin.user.pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.user.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'min:6',
            // 'password_confirmation' => 'min:6|required_with:password|same:password',
        ];

        $message = [
            'required' => 'Data tidak boleh kosong',
            'unique' => 'User Sudah ada!',
            'email' => 'Email maksimal :max karakter',
            // 'min' => 'Password minimam :min karakter',
            // 'same' => 'Konfirmasi Password tidak sama dengan Password',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            session()->put('danger', 'Data yang anda input tidak valid Atau Sama Dengan User Lain , silahkan di ulang');
            return back()->withErrors($validation)->withInput();
        }


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // $randomNumber = random_String('qwertyuiopasdfghjklzxcvbnm');
        $randomString = Str::random(6);


        $pegawai = new Tb_pegawai();
        $pegawai->id_user = $user->id;
        $pegawai->kode = $randomString;
        $pegawai->unit = "-";
        $pegawai->no_telepon = "-";
        $pegawai->alamat = "-";
        $pegawai->foto = "-";
        $pegawai->isActive = 1;
        $pegawai->pin = "000000";
        $pegawai->save();

        session()->put('success', ' Berhasil Menambah Pegawai');
        return redirect('admin/pegawai');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tb_pegawai  $tb_pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Tb_pegawai $tb_pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tb_pegawai  $tb_pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Tb_pegawai $tb_pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tb_pegawai  $tb_pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tb_pegawai $tb_pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tb_pegawai  $tb_pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tb_pegawai $tb_pegawai)
    {
        //
    }
}
