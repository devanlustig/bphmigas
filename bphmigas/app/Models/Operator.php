<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Operator extends Model
{
    use HasFactory;
    use Sortable;

    protected $table= "operator";
    protected $primaryKey = 'id_operator';
    protected $fillable = ['nama_operator', 'keterangan'];
    public $sortable = ['nama_operator'];

    public $timestamps = false;

    public function kapal(){
     return $this->hasMany(Kapal::class);
    }


}
