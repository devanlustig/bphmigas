<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;


class AsosiasiKapal extends Model
{
    //use HasFactory;
    use Sortable;
    use SoftDeletes;

    protected $table= "asosiasi_kapal";
    //protected $primaryKey = 'id_asosiasi_kapal';
    protected $fillable = ['asosiasi_kapal', 'keterangan'];
    public $sortable = ['asosiasi_kapal'];
    protected $dates = ['deleted_at'];

    public function pemilik(){
     return $this->hasMany(Pemilik::class);
    }

}
