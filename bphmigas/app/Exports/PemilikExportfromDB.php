<?php

namespace App\Exports;

use App\Models\Pemilik;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class PemilikExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
   	*/

    public function collection()
    {
        return Pemilik::all();
    } 

    public function map($pemilik) :array
    {
        return [
        	$pemilik->id_pemilik,
            $pemilik->nama_pemilik,
            $pemilik->id_asosiai_kapal,
        ];
    }

    public function headings():array
    {
        return [
            //pastikan urut dan jumlahnya sesuai dengan yang ada di mapping-data atau table di database
            'id_pemikik',
            'Nama Pemilik',
            'Asosiasi Kapal',
        ];
    }
}
