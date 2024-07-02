<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(){
        return view('user.index',[
            "title"=>"Data Pengguna",
            "data"=>User::all()
        ]);
    }
    public function create():View{
        return view('user.tambah')->with((["title"=> "Tambah data user"]));
            }

    public function store(Request $request):RedirectResponse{
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "username"=>"required",
            "role"=>"required",
            "password"=>"required"
        ]);
        $password=Hash::make($request->password);
        $request->merge([
            "password"=>$password
        ]);
        User::create($request->all());

        return redirect()->route('pengguna.index')->with('success','Data User Berhasil Ditambahkan');
    }
    public function edit(User $user): View
    {
        return view('user.edit', compact('user'))->with([
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

        $loginRole = Auth::user()->role;
        if ($loginRole == 'admin') {
            return redirect()->route('user.index')->with('updated', 'Data Pengguna Berhasil Diubah');
        } else {
            return redirect()->route('petugas.index')->with('updated', 'Data Pengguna Berhasil Diubah');
        }
    }
}
