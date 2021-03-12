<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbbm;

class TbbmController extends Controller
{
    public function index()
    {

      $tbbm = Tbbm::sortable()->paginate(5);
        
      return view('tbbm.index',compact('tbbm'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tbbm = Tbbm::sortable()->paginate(5);
       return view('tbbm.create',compact('tbbm'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        //return view('tbbm.create');
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
        'nama_tbbm' => 'required|max:50',
        'alamat' => 'required|max:150',

    ]);

     Tbbm::create($request->all());

     return redirect()->route('tbbm.index')
     ->with('success','Data tbbm telah ditambahkan');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tbbm $tbbm)
    {

        return view('tbbm.detail', compact('tbbm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tbbm $tbbm)
    {

        return view('tbbm.edit', compact('tbbm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tbbm $tbbm)
    {
        $request->validate([
            'nama_tbbm' => 'required|max:50',
        	'alamat' => 'required|max:150',
            
            
        ]);
        $tbbm->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('tbbm.index')
        ->with('success', 'tbbm Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tbbm $tbbm)
    {
        $tbbm->delete();
        
        return redirect()->route('tbbm.index')
        ->with('success', 'tbbm Berhasil Dihapus');
    }

    public function caritbbm(Request $request)
    {
        
        $cari = $request->q;
        $tbbm = Tbbm::where('nama_tbbm','like',"%".$cari."%")->paginate(2);
        return view('tbbm.index',compact('tbbm'));

     // mengirim data pegawai ke view index
       //return view('index',['tbbm' => $tbbm]);

   }
}
