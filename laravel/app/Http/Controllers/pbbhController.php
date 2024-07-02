<?php

namespace App\Http\Controllers;

use App\Models\pbbh;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class pbbhController extends Controller
{
    //
    public function create():View{
        return view('pbbh.create')->with([
            "title"=>"fcr",
        ]);
    }

    public function store(Request $request):RedirectResponse{
        $request->validate([
            "umur"=>"required",
            "pbbh"=>"nullable",
            "eph"=>"required",

        ]);
        pbbh::create($request->all());
        return redirect()->route('pbbh.create')->with('success','Data pbbh Berhasil Ditambahkan');
    }
}
