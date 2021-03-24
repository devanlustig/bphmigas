<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Pemilik extends Model
{
    use HasFactory;
    use Sortable;
    public $timestamps = false;

    protected $table= "pemilik";
    protected $primaryKey = 'id_pemilik';
    protected $fillable = ['nama_pemilik', 'id_asosiasi_kapal'];
    public $sortable = ['id_pemilik','nama_pemilik','id_pemilik','id_asosiasi_kapal'];

    public function asosiasi(){
     return $this->belongsTo(AsosiasiKapal::class,'id_asosiasi_kapal');
    }

    public function kapal(){
     return $this->hasMany(Kapal::class);
    }

    

}
