<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kecamatan extends Model
{
    protected $table = 'tbl_kecamatan';
    protected $fillable 	= ['nama','geojson','warna'];

    public function getData()
    {
    	return DB::table('tbl_kecamatan')
    		->get();
    }

    public function getDataWhere($id)
    {
    	return DB::table('tbl_kecamatan')
    		->where('id', $id)
    		->first();
    }

    public function insertData($data)
    {
    	return DB::table('tbl_kecamatan')
    		->insert($data);
    }

    public function updateData($id, $data)
    {
    	return DB::table('tbl_kecamatan')
    		->where('id', $id)
    		->update($data);
    }

    public function deleteData($id)
    {
    	return DB::table('tbl_kecamatan')
    		->where('id', $id)
    		->delete();
    }

}
