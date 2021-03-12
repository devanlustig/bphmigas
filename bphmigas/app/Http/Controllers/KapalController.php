<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kapal;
use App\Models\Pemilik;
use App\Models\Operator;

class KapalController extends Controller
{
    public function index()
    {

      $kapal = Kapal::sortable()->paginate(5);
 
        return view('kapal.index',compact('kapal'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operator = Operator::all(['id_operator','nama_operator']);
        $pemilik = Pemilik::all(['id_pemilik','nama_pemilik']);
        return view('kapal.create',compact('operator','pemilik'));
        //return view('kapal.create');
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
            'nama_kapal' => 'required|max:50',
            'id_operator' => 'required',
            'id_pemilik' => 'required',
            'tahun_pembuatan' => 'required|numeric|min:1900|max:2021',
            'gt' => 'required|numeric', 
            'dwt' => 'required|numeric', 
            'mesin_induk_jumlah' => 'required|numeric', 
            'mesin_induk_daya' => 'required|numeric',
            'mesin_bantu_jumlah' => 'required|numeric', 
            'mesin_bantu_daya' => 'required|numeric',  

        ]);
 
        Kapal::create($request->all());
 
        return redirect()->route('kapal.index')
                        ->with('success','Data Kapal telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kapal $kapal)
    {
       
        return view('kapal.detail', compact('kapal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kapal $kapal)
    {
        $operator = Operator::pluck('nama_operator', 'id_operator');
        $getoperatorID = $kapal->id_operator;

        $pemilik = Pemilik::pluck('nama_pemilik', 'id_pemilik');
        $getpemilikID = $kapal->id_pemilik;

        return view('kapal.edit', compact('kapal','operator','getoperatorID','pemilik','getpemilikID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kapal $kapal)
    {
        $request->validate([
            'nama_kapal' => 'required|max:50',
            'id_operator' => 'required',
            'id_pemilik' => 'required',
            'tahun_pembuatan' => 'required|numeric|min:1900|max:2021',
            'gt' => 'required|numeric', 
            'dwt' => 'required|numeric', 
            'mesin_induk_jumlah' => 'required|numeric', 
            'mesin_induk_daya' => 'required|numeric',
            'mesin_bantu_jumlah' => 'required|numeric', 
            'mesin_bantu_daya' => 'required|numeric',  
            
        ]);
        $kapal->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('kapal.index')
            ->with('success', 'Kapal Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kapal $kapal)
    {
        $kapal->delete();
        
        return redirect()->route('kapal.index')
            ->with('success', 'Kapal Berhasil Dihapus');
    }
}
