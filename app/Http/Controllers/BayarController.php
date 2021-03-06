<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tombol = User::where('id', Auth::user()->id)->first();

        if ($tombol->tombol_profile == '1') {
            if($tombol->tombol_bayar == '1'){
                $data = Profile::where('id_users', Auth::user()->id)->first();
                return view('bayar.statusBayar', compact('data'));
            }
            else
                return $this->create();
        }

        else {
            Alert::warning('Akses ditolak!', 'Mohon lengkapi profil terlebih dahulu');
            return redirect('/profil');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Profile::where('id_users', Auth::user()->id)->first();
        $bayar = $data->jumlah_keluarga * 40000;

        return view('bayar.bayar', compact('bayar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_akun' => 'required',
            'nomor_hp' => ['required', 'max:13', 'min:10']
        ]);

        $profil = Profile::where('id_users', Auth::user()->id)->first();

        Wallet::create([
            'jenis'=> $request->tombol,
            'id_profiles' => $profil->id,
        ]);

        Wallet::where('id_profiles', $profil->id)->update([
            'nama_akun' => $request->nama_akun,
            'nomor_hp' => $request->nomor_hp,
        ]);

        $profil->update([
            'zakat_bayar'=> $profil->jumlah_keluarga * 40000
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->tombol_bayar ='1';
        $user->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
