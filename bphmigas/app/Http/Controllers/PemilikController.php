<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilik as Pemilik;
use App\Models\AsosiasiKapal;
use PDF;
use App\Exports\PemilikExport;
use App\Exports\PemilikExportDetail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    public function index()
    {

      $pemilik = Pemilik::sortable(['id_pemilik'=>'desc'])->paginate(10);
      $asosiasi = AsosiasiKapal::all(['id','asosiasi_kapal']);

      return view('pemilik.index',compact('pemilik','asosiasi'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asosiasi = AsosiasiKapal::all(['id','asosiasi_kapal']);
        return view('pemilik.create',compact('asosiasi'));
        //return view('pemilik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $request->validate([
        'nama_pemilik' => 'required|max:50',
        'id_asosiasi_kapal' => 'required',  

    ]);

     Pemilik::create($request->all());

     return redirect()->route('pemilik.index')
     ->with('success','Data Pemilik telah ditambahkan');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pemilik $pemilik)
    {

        return view('pemilik.detail', compact('pemilik'));
    }

    public function exportpdfdetail(Pemilik $pemilik, $id) {        

        $pemilik = Pemilik::find($id);
        $namapemilik = $pemilik->nama_pemilik;
        $asosiasi = $pemilik->asosiasi->asosiasi_kapal;     

    //ambil tampilan resources/views/kelas/pdf.blade.php        
        $pdf = PDF::loadView("pemilik.pdfdetail", ['namapemilik'=>$namapemilik, 'asosiasi'=>$asosiasi]);        
        return $pdf->download('Detail_Pemilik.pdf');     

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemilik $pemilik)
    {

        $asosiasi = AsosiasiKapal::pluck('asosiasi_kapal', 'id');
        $getasosiasiID = $pemilik->id_asosiasi_kapal;
        return view('pemilik.edit', compact('pemilik','asosiasi','getasosiasiID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemilik $pemilik)
    {
        $request->validate([
            'nama_pemilik' => 'required|max:50',
            'id_asosiasi_kapal' => 'required',
            
        ]);
        $pemilik->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('pemilik.index')
        ->with('success', 'Pemilik Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemilik $pemilik)
    {
        $pemilik->delete();
        
        return redirect()->route('pemilik.index')
        ->with('success', 'Pemilik Berhasil Dihapus');
    }

    public function cari(Request $request)
    {

        $cari = $request->q;
        $pemilik = Pemilik::where('nama_pemilik', 'LIKE', '%' .$cari. '%')
        ->orWhereHas('asosiasi', function($q) use ($cari) {
            return $q->where('asosiasi_kapal', 'LIKE', '%' . $cari . '%');
        })->paginate(2);
        /*->get();

        //$pemilik = Pemilik::where('nama_pemilik','like',"%".$cari."%")->paginate(2); */

        return view('pemilik.index',compact('pemilik'));

     // mengirim data pegawai ke view index
       //return view('index',['pemilik' => $pemilik]);

    }

    public function exportpdf(Request $request) {        
        $data = Pemilik::get();        
        $tampil['data'] = $data; 

    //ambil tampilan resources/views/kelas/pdf.blade.php        
        $pdf = PDF::loadView("pemilik.pdf", $tampil);        
        return $pdf->download('Laporan_Pemilik.pdf');     

    }

    public function exportexcel()
    {
        $nama_file = 'data_pemilik_kapal_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new PemilikExport, $nama_file);
    }

    public function exportexceldetail(Request $request, $id)
    {
        /* this using query builder 
        $data=DB::table('pemilik')
        ->where('id_pemilik',$id)
         ->get(); */

        $data = Pemilik::with('asosiasi')->where('id_pemilik', $id)->paginate(5);
        $nama_file = 'detail_pemilik_kapal_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new PemilikExportDetail($data), $nama_file);
    }  
}
