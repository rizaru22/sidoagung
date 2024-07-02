<?php

namespace App\Http\Controllers;

use App\Models\peternakan;
use App\Models\priode;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class petugasController extends Controller
{
    //
    public function index()
    {
        $peternakan = Peternakan::all();
        $priode = Priode::where('aktif', 'on')->get();

        return view('petugas.index', [
            'title' => 'Peternakan',
            'data' => $peternakan,
            'periode' => $priode
        ]);
    }

    public function edit(User $user): View
    {
        return view('user.editpetugas', compact('user'))->with([
            'title' => 'Ubah Data Pengguna',
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'password' => 'required',
        ]);
        $password=Hash::make($request->password);
        $request->merge([
            "password"=>$password
        ]);
        $user->update($request->only(['password']));
        return redirect()->route('petugas.index')->with('updated', 'Data Pengguna Berhasil Diubah');
    }
}
