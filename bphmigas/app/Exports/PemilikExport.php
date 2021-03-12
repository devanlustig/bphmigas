<?php

namespace App\Exports;

use App\Models\Pemilik;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class PemilikExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
   public function view(): View
{
    return view('pemilik.excel', [
        'pemilik' => Pemilik::all()
    ]);
 }

   
}
