<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;

class PeriodeController extends Controller
{
	public function index()
	{

		$periode = Periode::sortable()->paginate(5);

		return view('periode.index',compact('periode'))
		->with('i', (request()->input('page', 1) - 1) * 5);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$periode = Periode::sortable()->paginate(5);
    	return view('periode.create',compact('periode'))
    	->with('i', (request()->input('page', 1) - 1) * 5);
        //return view('periode.create');
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
    		'nama_periode' => 'required|max:50',
    		'nomor' => 'required|max:50',
    		'tahun' => 'required|numeric|max:2030',

    	]);

    	Periode::create($request->all());

    	return redirect()->route('periode.index')
    	->with('success','Data periode telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode)
    {

    	return view('periode.detail', compact('periode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Periode $periode)
    {

    	return view('periode.edit', compact('periode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periode $periode)
    {
    	$request->validate([
    		'nama_periode' => 'required|max:50',
    		'nomor' => 'required|max:50',
    		'tahun' => 'required|numeric|max:2030',


    	]);
    	$periode->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
    	return redirect()->route('periode.index')
    	->with('success', 'periode Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periode $periode)
    {
    	$periode->delete();

    	return redirect()->route('periode.index')
    	->with('success', 'periode Berhasil Dihapus');
    }

    public function cariperiode(Request $request)
    {

    	$cari = $request->q;
    	$periode = Periode::where('nama_periode','like',"%".$cari."%")->paginate(2);
    	return view('periode.index',compact('periode'));

     // mengirim data pegawai ke view index
       //return view('index',['periode' => $periode]);

    }
}
