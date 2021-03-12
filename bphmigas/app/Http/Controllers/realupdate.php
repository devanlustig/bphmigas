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

        $pengisian = $realisasipengisianbbm->foto_bukti1;

        if($request->foto_bukti1 != ''){        


          //code for remove old file
          if($pengisian != ''  && $pengisian != null){
            /* $path = public_path().'/realisasipengisianbbm/'; */
            $path = "bphmigas/storage/app/public/realisasipengisianbbm/";
            $file_old = $path.$realisasipengisianbbm->foto_bukti1;
            unlink($file_old);

            
            $getfoto = $request->get('foto_bukti1');
            $simpan = $getfoto->hashName();
            $simpan->save();

        }

        $request->foto_bukti1->store('realisasipengisianbbm', 'public');
        
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