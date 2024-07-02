<?php

namespace App\Http\Controllers;

use App\Models\peternakan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class peternakanController extends Controller
{
    //
    public function index(){
        $peternakan=peternakan::all();
        return view('peternakan.index',[
            "title"=>"peternakan",
            "data"=>$peternakan
        ]);
    }

    public function create():View{
        return view('peternakan.create')->with([
            "title"=>"Tambah Data peternakan",
        ]);
    }

    public function store(Request $request):RedirectResponse{
        $request->validate([
            "nama"=>"required",
            "alamat"=>"nullable",
            "noHp"=>"required",

        ]);
        peternakan::create($request->all());
        return redirect()->route('peternakan.index')->with('success','Data peternakan Berhasil Ditambahkan');
    }

    public function edit(peternakan $peternakan):View
    {
        return view('peternakan.edit',compact('peternakan'))->with([
            "title" => "Ubah Data peternakan",
        ]);
    }

    public function update(peternakan $peternakan, Request $request):RedirectResponse{
        $request->validate([
            "nama"=>"required",
            "alamat"=>"nullable",
            "noHp"=>"required"
        ]);

        $peternakan->update($request->all());
        return redirect()->route('peternakan.index')->with('updated','Data peternakan Berhasil Diubah');
    }

    public function destroy($id):RedirectResponse
    {
        peternakan::where('id',$id)->delete();
        return redirect()->route('peternakan.index')->with('deleted','Data peternakan Berhasil Dihapus');
    }
}
