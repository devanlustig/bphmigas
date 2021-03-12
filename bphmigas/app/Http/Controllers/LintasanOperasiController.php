<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LintasanOperasi;

class LintasanOperasiController extends Controller
{
     public function index()
    {

      $lintasan = LintasanOperasi::sortable()->paginate(5);

      return view('lintasan.index',compact('lintasan'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $lintasan = LintasanOperasi::sortable()->paginate(5);
       return view('lintasan.create',compact('lintasan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        'lintasan_operasi' => 'required|max:50',
        'keterangan' => 'required',  

    ]);

       LintasanOperasi::create($request->all());

       return redirect()->route('lintasan.index')
       ->with('success','Data lintasan telah ditambahkan');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(lintasanOperasi $lintasan)
    {

        return view('lintasan.detail', compact('lintasan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LintasanOperasi $lintasan)
    {

        return view('lintasan.edit', compact('lintasan'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LintasanOperasi $lintasan)
    {
        $request->validate([
            'lintasan_operasi' => 'required|max:50',
            'keterangan' => 'required',
            
        ]);
        $lintasan->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('lintasan.index')
        ->with('success', 'lintasan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LintasanOperasi $lintasan)
    {
        $lintasan->delete();
        
        return redirect()->route('lintasan.index')
        ->with('success', 'lintasan Berhasil Dihapus');
    }

    public function carilintasan(Request $request)
    {

        $cari = $request->q;
        $lintasan = LintasanOperasi::where('lintasan_operasi','like',"%".$cari."%")->paginate(2);
        return view('lintasan.index',compact('lintasan'));

     // mengirim data pegawai ke view index
       //return view('index',['lintasan' => $lintasan]);

    }
}
