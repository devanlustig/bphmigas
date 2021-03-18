<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Tbbm extends Model
{
    use HasFactory;
    use Sortable;

    protected $table= "tbbm";
    protected $primaryKey = 'id_tbbm';
    protected $fillable = ['nama_tbbm', 'id_kabupaten','alamat','latitude','longitude'];
    public $sortable = ['nama_tbbm','alamat','id_kabupaten'];

    public $timestamps = false;

    public function realisasipengisianbbm(){
     return $this->hasMany(RealisasiPengisianBbm::class);
    }

    public function usulankuota(){
     return $this->hasMany(Usulankuota::class);
    }


}
