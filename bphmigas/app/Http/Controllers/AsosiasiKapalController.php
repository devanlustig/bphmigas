<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsosiasiKapal;

class AsosiasiKapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $asosiasikapal = AsosiasiKapal::sortable()->paginate(5);

      return view('asosiasikapal.index',compact('asosiasikapal'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asosiasikapal.create');
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
        'asosiasi_kapal' => 'required',
        'keterangan' => 'required',
    ]);

       AsosiasiKapal::create($request->all());

       return redirect()->route('asosiasikapal.index')
       ->with('success','Asosiasi created successfully.');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AsosiasiKapal $asosiasikapal)
    {
        // $asosiasikapal = AsosiasiKapal::find($id);
        // return view('asosiasikapal.detail', compact('asosiasikapal'));
        return view('asosiasikapal.detail', compact('asosiasikapal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AsosiasiKapal $asosiasikapal)
    {
        //$asosiasikapal = AsosiasiKapal::find($id);
        return view('asosiasikapal.edit', compact('asosiasikapal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsosiasiKapal $asosiasikapal)
    {
        $request->validate([
            'asosiasi_kapal' => 'required',
            
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        //AsosiasiKapal::find($id)->update($request->all());
        $asosiasikapal->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('asosiasikapal.index')
        ->with('success', 'Asosiasi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AsosiasiKapal $asosiasikapal)
    {
        //AsosiasiKapal::find($id)->delete();
        $asosiasikapal->delete();
        
        return redirect()->route('asosiasikapal.index')
        ->with('success', 'Asosiasi Berhasil Dihapus');
    }

    public function softasos(AsosiasiKapal $asosiasikapal, $id)
    {
        $asosiasi = AsosiasiKapal::find($id);
        $asosiasi->delete();

        return redirect()->route('asosiasikapal.index')
        ->with('success', 'Asosiasi Berhasil Dihapus');
    }

    public function trash()
    {

     // mengampil data asosiasi yang sudah dihapus

        $asosiasi = AsosiasiKapal::onlyTrashed()->get();
        return view('asosiasikapal.trash',compact('asosiasi'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function kembalikansemua()
    {
     // menampung data asosiasi   
     $asosiasi = AsosiasiKapal::onlyTrashed();
     // kembalikan semua data
     $asosiasi->restore();

     return redirect('asosiasikapal/trash')
     ->with('success', 'Asosiasi Berhasil Dikembalikan');
 }

 public function kembalikan($id)
 {
    $asosiasi = AsosiasiKapal::onlyTrashed()->where('id',$id);
    $asosiasi->restore();
    return redirect('asosiasikapal/trash')
    ->with('success', 'Asosiasi Berhasil Dikembalikan');
}

 public function permanen($id)
{
     // hapus permanen data asosiasi
     $asosiasi = AsosiasiKapal::onlyTrashed()->where('id',$id);
     $asosiasi->forceDelete();
     return redirect('asosiasikapal/trash')
    ->with('success', 'Asosiasi Berhasil Dihapus');
}

public function permanensemua()
{
     // hapus permanen semua data guru yang sudah dihapus
     $asosiasi = AsosiasiKapal::onlyTrashed();
     $asosiasi->forceDelete();
 
      return redirect('asosiasikapal/trash')
    ->with('success', 'Asosiasi Berhasil Dihapus');
}

}
