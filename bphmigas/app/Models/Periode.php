<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Periode extends Model
{
    use HasFactory;
    use Sortable;

    protected $table= "periode";
    protected $primaryKey = 'id_periode';
    protected $fillable = ['nama_periode','nomor','tahun', 'keterangan'];
    public $sortable = ['nama_operator','nomor','tahun'];

    public $timestamps = false;

    public function usulankuota(){
     return $this->hasMany(Usulankuota::class);
    }

}
