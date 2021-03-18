<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class UsulanKuotaPerPeriode extends Model
{
    use HasFactory;
    use Sortable;

	protected $table= "usulan_kuota_per_periode";
	protected $primaryKey = 'id_usulan_kuota';
	protected $fillable = ['id_kapal', 'id_tbbm', 'id_periode','id_lintasan_operasi','kecepatan','jarak','jumlah_trip','kuota'];
	public $sortable = ['id_kapal', 'id_tbbm', 'id_periode','id_lintasan_operasi','kecepatan','jarak','jumlah_trip','kuota'];

	public $timestamps = false;

	public function kapal(){
		return $this->belongsTo(Kapal::class, 'id_kapal');
	}

	public function tbbm(){
		return $this->belongsTo(Tbbm::class,'id_tbbm');
	}

	public function periode(){
		return $this->belongsTo(Periode::class,'id_periode');
	}
	public function lintasan(){
		return $this->belongsTo(LintasanOperasi::class,'id_lintasan_operasi');
	}
}
