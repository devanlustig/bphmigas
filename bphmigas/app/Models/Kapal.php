<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Kapal extends Model
{
    //use HasFactory;
    use Sortable;

    protected $table= "kapal";
    protected $primaryKey = 'id_kapal';
    protected $fillable = ['nama_kapal', 'id_operator', 'id_pemilik','tahun_pembuatan','gt','dwt',
							'mesin_induk_jumlah','mesin_induk_daya','mesin_bantu_jumlah','mesin_bantu_daya'];
    public $sortable = ['nama_kapal', 'id_operator', 'id_pemilik','tahun_pembuatan','gt','dwt',
							'mesin_induk_jumlah','mesin_induk_daya','mesin_bantu_jumlah','mesin_bantu_daya'];

    public function pemilik(){
     return $this->belongsTo(Pemilik::class, 'id_pemilik');
    }

     public function operator(){
     return $this->belongsTo(Operator::class,'id_operator');
    }

    public function realisasipengisianbbm(){
     return $this->hasMany(RealisasiPengisianBbm::class);
    }

     public function usulankuota(){
     return $this->hasMany(Usulankuota::class);
    }

}
