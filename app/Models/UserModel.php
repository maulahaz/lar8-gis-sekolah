<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{

    public function getData()
    {
    	return DB::table('users')
    		->get();
    }

    public function getDataWhere($id)
    {
    	return DB::table('users')
    		->where('id', $id)
    		->first();
    }

    public function insertData($data)
    {
    	return DB::table('users')
    		->insert($data);
    }

    public function updateData($id, $data)
    {
    	return DB::table('users')
    		->where('id', $id)
    		->update($data);
    }

    public function deleteData($id)
    {
    	return DB::table('users')
    		->where('id', $id)
    		->delete();
    }

}
