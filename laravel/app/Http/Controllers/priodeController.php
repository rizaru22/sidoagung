<?php

namespace App\Http\Controllers;

use App\Models\priode;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class priodeController extends Controller
{
    //
    public function index(){
        $priode=priode::all();
        return view('priode.index',[
            "title"=>"priode",
            "data"=>$priode,
         ]);

    }
    public function create($id):View{
        return view('priode.create')->with([
            "title"=>"Tambah Data priode ",
            "id_peternakan"=> $id
        ]);
    }

    public function store(Request $request):RedirectResponse{
        $request->validate([
            "id_peternakan"=>"required",
            "tgl_mulai"=>"nullable",
            "tgl_akhir"=>"required",
            "aktif"=>"required",

        ]);
        priode::create($request->all());
        return redirect()->route('priode.index')->with('success','Data priode Berhasil Ditambahkan');
    }
    public function edit($id): View
    {
        $priode = Priode::find($id);
        if (!$priode) {
            return redirect()->route('priode.index')->withErrors(['error' => 'Priode tidak ditemukan']);
        }

        return view('priode.edit', compact('priode'))->with([
            'title' => 'Ubah Data Priode',
            'id_peternakan' => $id
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'aktif' => 'required',
        ]);

        $priode = Priode::find($id);
        if ($priode) {
            $priode->update($request->all());
            return redirect()->route('priode.index')->with('updated', 'Data Priode Berhasil Diubah');
        } else {
            return redirect()->back()->withErrors(['error' => 'Priode tidak ditemukan']);
        }
    }
    public function destroy($id):RedirectResponse
    {
        priode::where('id',$id)->delete();
        return redirect()->route('priode.index')->with('deleted','Data priode Berhasil Dihapus');
    }
}
