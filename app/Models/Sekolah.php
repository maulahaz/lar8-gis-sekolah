<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'tbl_sekolah';
    protected $fillable 	= ['nama','jenjang_id','status','kecamatan_id'];
}
