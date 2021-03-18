<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Tbbm;
use App\Models\UsulanKuotaPerPeriode;
use App\Models\LintasanOperasi;
use App\Models\Kapal;

class UsulanKuotaPerPeriodeController extends Controller
{
	public function index()
	{

		$usulankuotaperperiode = UsulanKuotaPerPeriode::sortable()->paginate(5);

		return view('usulankuota.index',compact('usulankuotaperperiode'))
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
    	$periode = Periode::all(['id_periode','nama_periode']);
    	$tbbm = Tbbm::all(['id_tbbm','nama_tbbm']);
    	$lintasan= LintasanOperasi::all(['id_lintasan_operasi','lintasan_operasi']);
    	return view('usulankuota.create',compact('kapal','periode','tbbm','lintasan'));
        //return view('usulankuota.create');
    }

    public function store(Request $request)
    {
    	$request->validate([

    		'id_kapal' => 'required',
    		'id_periode' => 'required',
    		'id_lintasan_operasi' => 'required',
    		'id_tbbm' => 'required', 
    		'kecepatan' => 'required|numeric', 
    		'jarak' => 'required|numeric', 
    		'jumlah_trip' => 'required|numeric',
    		'kuota' => 'required|numeric', 


    	]);

    	UsulanKuotaPerPeriode::create($request->all());

    	return redirect()->route('usulankuotaperperiode.index')
    	->with('success','Data usulankuota telah ditambahkan');
    }

    public function show(UsulanKuotaPerPeriode $usulankuotaperperiode)
    {

    	return view('usulankuota.detail', compact('usulankuotaperperiode'));
    }

    public function edit(UsulanKuotaPerPeriode $usulankuotaperperiode)
    {
        $kapal = Kapal::pluck('nama_kapal', 'id_kapal');
        $getkapalID = $usulankuotaperperiode->id_kapal;

        $tbbm = Tbbm::pluck('nama_tbbm', 'id_tbbm');
        $gettbbmID = $usulankuotaperperiode->id_tbbm;

        $periode = Periode::pluck('nama_periode', 'id_periode');
        $getperiodeID = $usulankuotaperperiode->id_periode;

        $lintasan = LintasanOperasi::pluck('lintasan_operasi', 'id_lintasan_operasi');
        $getlintasanID = $usulankuotaperperiode->id_lintasan_operasi;

        return view('usulankuota.edit', compact('usulankuotaperperiode','kapal','getkapalID','tbbm','gettbbmID','periode','getperiodeID','getlintasanID','lintasan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsulanKuotaPerPeriode $usulankuotaperperiode)
    {
        $request->validate([
            'id_kapal' => 'required',
            'id_periode' => 'required',
            'id_lintasan_operasi' => 'required',
            'id_tbbm' => 'required', 
            'kecepatan' => 'required|numeric', 
            'jarak' => 'required|numeric', 
            'jumlah_trip' => 'required|numeric',
            'kuota' => 'required|numeric',  
            
        ]);
        $usulankuotaperperiode->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('usulankuotaperperiode.index')
            ->with('success', 'usulankuota Berhasil Diupdate');
    }

     public function destroy(UsulanKuotaPerPeriode $usulankuotaperperiode)
    {
        $usulankuotaperperiode->delete();
        
        return redirect()->route('usulankuotaperperiode.index')
        ->with('success', 'Operator Berhasil Dihapus');
    }

    public function cariusulan(Request $request)
    {
    	

    	$cari = $request->q;
        $usulankuotaperperiode = 
        UsulanKuotaPerPeriode::where('id_usulan_kuota', 'LIKE', '%' .$cari. '%')
        ->orWhereHas('kapal', function($q) use ($cari) {
            $q->where('nama_kapal', 'LIKE', '%' . $cari . '%');
        })
        ->orWhereHas('lintasan', function($q) use ($cari) {
            $q->where('lintasan_operasi', 'LIKE', '%' . $cari . '%');
        })
        ->orWhereHas('tbbm', function($q) use ($cari) {
            $q->where('nama_tbbm', 'LIKE', '%' . $cari . '%');

        })->paginate(5);

        return view('usulankuota.index',compact('usulankuotaperperiode'));

    }

}
