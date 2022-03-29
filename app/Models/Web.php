<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Web extends Model
{

    public function getDataKecamatan()
    {
    	return DB::table('tbl_kecamatan')
    		->get();
    }

}
