<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class LintasanOperasi extends Model
{
    use HasFactory;
    use Sortable;

    protected $table= "lintasan_operasi";
    protected $primaryKey = 'id_lintasan_operasi';
    protected $fillable = ['lintasan_operasi', 'keterangan'];
    public $sortable = ['lintasan_operasi'];

}
