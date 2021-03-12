<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;

class OperatorController extends Controller
{
    public function index()
    {

      $operator = Operator::sortable()->paginate(5);
        
      return view('operator.index',compact('operator'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operator = Operator::sortable()->paginate(5);
       return view('operator.create',compact('operator'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        //return view('Operator.create');
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
        'nama_operator' => 'required|max:50',

    ]);

     Operator::create($request->all());

     return redirect()->route('operator.index')
     ->with('success','Data Operator telah ditambahkan');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {

        return view('operator.detail', compact('operator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Operator $operator)
    {

        return view('operator.edit', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operator $operator)
    {
        $request->validate([
            'nama_operator' => 'required|max:50',
            
            
        ]);
        $operator->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('operator.index')
        ->with('success', 'Operator Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operator $operator)
    {
        $operator->delete();
        
        return redirect()->route('operator.index')
        ->with('success', 'Operator Berhasil Dihapus');
    }

    public function carioperator(Request $request)
    {
        
        $cari = $request->q;
        $operator = Operator::where('nama_operator','like',"%".$cari."%")->paginate(2);
        return view('operator.index',compact('operator'));

     // mengirim data pegawai ke view index
       //return view('index',['Operator' => $Operator]);

   }
}
