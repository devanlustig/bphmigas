<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class RealisasiPengisianBbm extends Model
{
	//use HasFactory;
    use Sortable;

    protected $table= "realisasi_pengisian_bbm";
    protected $primaryKey = 'id_realisasi_pengisian_bbm';
    protected $fillable = ['id_kapal', 'id_tbbm', 'id_periode','tanggal_pengisian','jumlah_pengisian','foto_bukti1'];
    public $sortable = ['id_kapal', 'id_tbbm', 'id_periode','tanggal_pengisian'];

    public $timestamps = false;
    protected $dates = ['tanggal_pengisian'];

    public function kapal(){
     return $this->belongsTo(Kapal::class, 'id_kapal');
    }

     public function tbbm(){
     return $this->belongsTo(Tbbm::class,'id_tbbm');
    }
}
