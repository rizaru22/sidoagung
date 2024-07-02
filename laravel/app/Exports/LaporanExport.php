<?php

namespace App\Exports;

use App\Models\laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return laporan::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'Petugas ID',
            'MDD CI',
            'Priode Peternakan',
            'Tgl CI',
            'Pop E',
            'BW DOC',
            'DOC',
            'Jenis Pakan',
            'TKP Sak',
            'SP Sak',
            'Terpakai',
            'Umur',
            'Mor E',
            'Mor',
            'Ayam Hidup',
            'BW',
            'FI',
            'Act FCR',
            'Std FCR',
            'Dif',
            'PBBH',
            'Std PBBH',
            'Progres',
            'EP',
            'Std EPH',
            'progres2',
            'Suhu',
            'RH',
            'HI',
            'Kepadatan',
            'TRA',
            'TMA',
            'Treatment OVK',
            'Kondisi',
            'Saran',
        ];
    }
}
