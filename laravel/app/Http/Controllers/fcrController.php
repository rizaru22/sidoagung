<?php

namespace App\Http\Controllers;

use App\Models\fcr;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class fcrController extends Controller
{
    //
    public function create():View{
        return view('fcr.create')->with([
            "title"=>"fcr",
        ]);
    }

    public function store(Request $request):RedirectResponse{
        $request->validate([
            "bw"=>"required",
            "fcr"=>"nullable",
            "mor"=>"required",

        ]);
        fcr::create($request->all());
        return redirect()->route('fcr.create')->with('success','Data fcr Berhasil Ditambahkan');
    }
}
