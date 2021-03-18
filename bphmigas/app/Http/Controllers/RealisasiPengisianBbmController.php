<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealisasiPengisianBbm;
use App\Models\Kapal;
use App\Models\Tbbm;
use App\Models\Periode;
use Illuminate\Support\Facades\Storage;


class RealisasiPengisianBbmController extends Controller
{
    // public function __construct() {
    //     $this->middleware('user')->only('index');
    // }

   public function index()
   {
    $path = "/bphmigas/public/realisasipengisianbbm/";
    $realisasipengisianbbm = RealisasiPengisianBbm::sortable()->paginate(5);

    return view('realisasipengisianbbm.index',compact('realisasipengisianbbm','path'))
    ->with('i', (request()->input('page', 1) - 1) * 5);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$kapal = Kapal::all(['id_kapal','nama_kapal']);
    	$tbbm = Tbbm::all(['id_tbbm','nama_tbbm']);
        $periode = Periode::all(['id_periode','nama_periode']);
    	return view('realisasipengisianbbm.create',compact('kapal','tbbm','periode'));
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
    		'id_kapal' => 'required',
    		'id_tbbm' => 'required',
            'id_periode' => 'required',
    		'tanggal_pengisian' => 'required',
    		'jumlah_pengisian'=>'required',

    	]);

    	RealisasiPengisianBbm::create($request->all());

    	return redirect()->route('realisasipengisianbbm.index')
    	->with('success','Data pengisian telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RealisasiPengisianBbm $realisasipengisianbbm)
    {
        $path = "/bphmigas/public/realisasipengisianbbm/";
        return view('realisasipengisianbbm.detail', compact('realisasipengisianbbm','path'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RealisasiPengisianBbm $realisasipengisianbbm)
    {
        $path = "/bphmigas/public/realisasipengisianbbm/";
        $kapal = Kapal::pluck('nama_kapal','id_kapal');
        $getkapalID = $realisasipengisianbbm->id_kapal;

        $tbbm = Tbbm::pluck('nama_tbbm','id_tbbm');
        $gettbbmID = $realisasipengisianbbm->id_tbbm;

        $periode = Periode::pluck('nama_periode','id_periode');
        $getperiodeID = $realisasipengisianbbm->id_periode;

        return view('realisasipengisianbbm.edit', compact('realisasipengisianbbm','kapal','tbbm','getkapalID','gettbbmID','path','periode','getperiodeID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealisasiPengisianBbm $realisasipengisianbbm)
    {
        $rules = [

            'id_kapal' => 'required',
            'id_tbbm' => 'required',
            'id_periode' => 'required',
            'tanggal_pengisian' => 'required',
            'jumlah_pengisian'=>'required',
        ];

        $customMessages = [
            'required' => ' :attribute harus diisi !!!'
        ];

        $this->validate($request, $rules, $customMessages);

        $pengisian = RealisasiPengisianBbm::find($realisasipengisianbbm);
        $bukti = $request->file('foto_bukti1');

        if($request->foto_bukti1 != ''){        
            $path = "bphmigas/public/realisasipengisianbbm/";
          //code for remove old file
            if($pengisian != ''  && $pengisian != null){
                /* $path = public_path().'/realisasipengisianbbm/'; */
                $buktiname = "foto_bukti".time().'.'.$bukti->extension();
                $bukti->move(public_path('realisasipengisianbbm'),$buktiname);
                $file_old = $path.$realisasipengisianbbm->foto_bukti1;
                unlink($file_old);
                $realisasipengisianbbm->foto_bukti1 = $buktiname;
                $realisasipengisianbbm->update();
            }
        }

        $update['id_kapal'] = $request->get('id_kapal');
        $update['id_tbbm'] = $request->get('id_tbbm');
        $update['id_periode'] = $request->get('id_periode');
        $update['tanggal_pengisian'] = $request->get('tanggal_pengisian');
        $update['jumlah_pengisian'] = $request->get('jumlah_pengisian');


        $realisasipengisianbbm->update($update);


        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('realisasipengisianbbm.index')
        ->with('success', 'pengisian Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealisasiPengisianBbm $realisasipengisianbbm)
    {
      $image = $realisasipengisianbbm->foto_bukti1;
      $repo = "bphmigas/public/realisasipengisianbbm/";

      if($image!=''){
        $file_old = $repo.$image;
        if(file_exists($file_old)){
            unlink($file_old);
        }
    }

    $realisasipengisianbbm->delete();

    return redirect()->route('realisasipengisianbbm.index')
    ->with('success', 'Realisasi Pengisian Berhasil Dihapus');
}

public function caripengisian(Request $request)
{

   $cari = $request->q;
   $realisasipengisianbbm = RealisasiPengisianBbm::where('id_realisasi_pengisian_bbm','like',"%".$cari."%")->paginate(2);
   return view('realisasipengisianbbm.index',compact('realisasipengisianbbm'));

     // mengirim data pegawai ke view index
       //return view('index',['pengisian' => $pengisian]);

}

public function upload(Request $request){

    $rules = [
        'foto_bukti1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'id_kapal' => 'required',
        'id_tbbm' => 'required',
        'id_periode' => 'required',
        'tanggal_pengisian' => 'required',
        'jumlah_pengisian'=>'required',
    ];

    $customMessages = [
        'required' => ' :attribute harus diisi !!!'
    ];

    $this->validate($request, $rules, $customMessages);

    $name = $request->foto_bukti1;
    $bukti = $request->file('foto_bukti1');
    $buktiname = "foto_bukti".time().'.'.$bukti->extension();
    $bukti->move(public_path('realisasipengisianbbm'),$buktiname);


    $save = new RealisasiPengisianBbm;

    $save->foto_bukti1 = $buktiname;
    $save->id_kapal = $request->id_kapal;
    $save->id_tbbm = $request->id_tbbm;
    $save->id_periode = $request->id_periode;
    $save->tanggal_pengisian = $request->tanggal_pengisian;
    $save->jumlah_pengisian = $request->jumlah_pengisian;
    $save->save();

    return redirect()->route('realisasipengisianbbm.index')
    ->with('success','Data Realisasi telah ditambahkan');
    /* return redirect()->back(); */


}

}
