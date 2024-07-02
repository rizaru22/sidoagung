<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\peternakan;
use App\Models\priode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
class LaporanController extends Controller
{
    //
    public function index(){
        $laporan=laporan::all();
        return view('laporan.index',[
            "title"=>"laporan",
            "data"=>$laporan,
         ]);
    }
    public function select(){
        $laporan=peternakan::all();
        $priode = priode::all();
        return view('laporan.select',[
            "title"=>"laporan",
            "data"=>$laporan,
            "priode" => $priode
         ]);

    }
    public function create($id){
        return view('laporan.create', ["title" => "Tambah Laporan", "priode_id" => $id]);
    }

    public function show($id): View {
        $laporan = laporan::where('priode_id', $id)->get();
        return view('laporan.show')->with([
            "title" => "laporan",
            "data" => $laporan
        ]);
    }


    public function store(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'petugas_id' => 'required',
        'mdd_ci' => 'required',
        'priode_id' => 'required',
        'tgl_ci' => 'required',
        'pop_e' => 'required',
        'bw_doc' => 'required',
        'doc' => 'required',
        'jenis_pakan' => 'required',
        'tkp_sak' => 'required',
        'sp_sak' => 'required',
        'terpakai' => 'required',
        'umur' => 'required',
        'mor_e' => 'required',
        'mor' => 'required',
        'ayam_hidup' => 'required',
        'bw' => 'required',
        'fi' => 'required',
        'act_fcr' => 'required',
        'std_fcr' => 'required',
        'dif' => 'required',
        'pbbh' => 'required',
        'std_pbbh' => 'required',
        'progres' => 'required',
        'ep' => 'required',
        'std_eph' => 'required',
        'progres2' => 'required',
        'suhu' => 'required',
        'rh' => 'required',
        'hi' => 'required',
        'kepadatan' => 'required',
        'tra' => 'required',
        'tma' => 'required',
        'treatment_ovk' => 'required',
        'kondisi' => 'required',
        'saran' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
$petugas_id = Auth::id();
    Laporan::create([
    'petugas_id' => $petugas_id,
    'mdd_ci' => $request->mdd_ci,
    'priode_id' => $id,
    'map' => $request->map,
    'tgl_ci' => $request->tgl_ci,
    'pop_e' => $request->pop_e,
    'bw_doc' => $request->bw_doc,
    'doc' => $request->doc,
    'jenis_pakan' => $request->jenis_pakan,
    'tkp_sak' => $request->tkp_sak,
    'sp_sak' => $request->sp_sak,
    'terpakai' => $request->terpakai,
    'umur' => $request->umur,
    'mor_e' => $request->mor_e,
    'mor' => $request->mor,
    'ayam_hidup' => $request->ayam_hidup,
    'bw' => $request->bw,
    'fi' => $request->fi,
    'act_fcr' => $request->act_fcr,
    'std_fcr' => $request->std_fcr,
    'dif' => $request->dif,
    'pbbh' => $request->pbbh,
    'std_pbbh' => $request->std_pbbh,
    'progres' => $request->progres,
    'ep' => $request->ep,
    'std_eph' => $request->std_eph,
    'progres2' => $request->progres2,
    'suhu' => $request->suhu,
    'rh' => $request->rh,
    'hi' => $request->hi,
    'kepadatan' => $request->kepadatan,
    'tra' => $request->tra,
    'tma' => $request->tma,
    'treatment_ovk' => $request->treatment_ovk,
    'kondisi' => $request->kondisi,
    'saran' => $request->saran,
]);

return redirect()->route('petugas.index')->with('success', 'Laporan berhasil ditambahkan');
}
}
