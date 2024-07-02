<?php

namespace App\Livewire;

use DateTime;
use App\Models\fcr;
use App\Models\laporan;
use App\Models\pbbh;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InputData extends Component
{
    public $currentStep=1;
    public $totalStep=4;
    public $priode_id;
    public $petugas_id;
    public $mdd_ci;
    public $tgl_ci;
    public $pop_e;
    public $bw_doc;
    public $doc;
    public $jenis_pakan;
    public $tkp_sak;
    public $sp_sak;
    public $terpakai;
    public $umur;
    public $mor_e;
    public $mor;
    public $ayam_hidup;
    public $bw;
    public $fi;
    public $act_fcr;
    public $std_fcr;
    public $dif;
    public $pbbh;
    public $std_pbbh;
    public $progres;
    public $ep;
    public $std_eph;
    public $progres2;
    public $suhu;
    public $rh;
    public $hi;
    public $kepadatan;
    public $tra;
    public $tma;
    public $treatment_ovk;
    public $kondisi;
    public $saran;

        public function render()
        {



                $this->terpakai=$this->tkp_sak - $this->sp_sak;
                $tanggalSekarang=new DateTime('now');
                $newTglCI=new DateTime($this->tgl_ci);
                $umur=date_diff($tanggalSekarang,$newTglCI);
                $this->umur=$umur->days;
                if ($this->mor_e != 0 && $this->bw != 0) {
                    $this->mor = $this->mor_e / $this->pop_e * 100;
                    $this->ayam_hidup = $this->pop_e - $this->mor_e;
                    $this->fi = $this->terpakai * 50 / $this->ayam_hidup;
                    $this->act_fcr = $this->fi / $this->bw;
                    $bulat = floor($this->bw * 100) / 100;
                    $std_fcr = fcr::where('bw', '>=', $bulat)
                                   ->select('fcr')
                                   ->orderBy('bw')
                                   ->limit(1)
                                   ->first();
                    $this->std_fcr = $std_fcr['fcr'];
                    $this->dif = round($this->act_fcr - $this->std_fcr, 3);
                }

                //std_pbbh
                $pbbh_record = Pbbh::where('umur', '>=', $this->umur)
                ->select('pbbh')
                ->orderBy('umur')
                ->limit(1)
                ->first();

            if ($pbbh_record) {
                $this->std_pbbh = $pbbh_record->pbbh;
            } else {
                $this->std_pbbh = null;
            }
            //std eph
            $eph_record = Pbbh::where('umur', '>=', $this->umur)
                ->select('eph')
                ->orderBy('umur')
                ->limit(1)
                ->first();

                $this->std_eph = $eph_record ? $eph_record->eph : null;

            //progres
            if ($this->pbbh !== null && $this->std_pbbh !== null) {
                $this->progres = $this->pbbh - $this->std_pbbh;
            } else {
                $this->progres = null;
            }
            //ep
            if ($this->bw !== null && $this->fi !== null) {
                $this->ep = round($this->bw / $this->fi * 100, 3);
            } else {
                $this->ep = null;
            }
            //progres2
            if ($this->ep !== null && $this->std_eph !== null) {
                $this->progres2 = round($this->ep - $this->std_eph);
            } else {
                $this->progres = null;
            }
            //hi
            $farenheit = floor(($this->suhu * 9/5) + 32);
            $hi = $farenheit+$this->rh;
            $this->hi = $hi;




            // dd($bulat);
            return view('livewire.input-data', [
                'title' => 'Tambah Laporan',
            ]);
        }

    public function mount($priode_id)
    {
        $this->priode_id = $priode_id;
        $this->petugas_id = Auth::id();
    }

    public function submit()
    {
        $this->validate([
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

        laporan::create([
            'petugas_id' => $this->petugas_id,
            'mdd_ci' => $this->mdd_ci,
            'priode_id' => $this->priode_id,
            'tgl_ci' => $this->tgl_ci,
            'pop_e' => $this->pop_e,
            'bw_doc' => $this->bw_doc,
            'doc' => $this->doc,
            'jenis_pakan' => $this->jenis_pakan,
            'tkp_sak' => $this->tkp_sak,
            'sp_sak' => $this->sp_sak,
            'terpakai' => $this->terpakai,
            'umur' => $this->umur,
            'mor_e' => $this->mor_e,
            'mor' => $this->mor,
            'ayam_hidup' => $this->ayam_hidup,
            'bw' => $this->bw,
            'fi' => $this->fi,
            'act_fcr' => $this->act_fcr,
            'std_fcr' => $this->std_fcr,
            'dif' => $this->dif,
            'pbbh' => $this->pbbh,
            'std_pbbh' => $this->std_pbbh,
            'progres' => $this->progres,
            'ep' => $this->ep,
            'std_eph' => $this->std_eph,
            'progres2' => $this->progres2,
            'suhu' => $this->suhu,
            'rh' => $this->rh,
            'hi' => $this->hi,
            'kepadatan' => $this->kepadatan,
            'tra' => $this->tra,
            'tma' => $this->tma,
            'treatment_ovk' => $this->treatment_ovk,
            'kondisi' => $this->kondisi,
            'saran' => $this->saran,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Laporan berhasil ditambahkan');
    }

    public function incrementStep(){
        if($this->currentStep<$this->totalStep){
            $this->currentStep +=1;
        }
    }

    public function decrementStep(){
        if($this->currentStep>1){
            $this->currentStep -=1;
        }
    }
}
