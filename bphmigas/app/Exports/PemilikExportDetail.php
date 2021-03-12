<?php

namespace App\Exports;

use App\Models\Pemilik;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class PemilikExportDetail implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    
    protected $data;

    public function __construct($data){
    	
    	$this->data = $data;
    }

    public function view(): View
    {
    	return view('pemilik.exceldetail',[
    		'data' => $this->data ?: Pemilik::all()
    	]);
    }


}
