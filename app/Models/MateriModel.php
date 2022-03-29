<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriModel extends Model
{
    protected $table = 'tbl_materi';
    protected $fillable 	= ['title','posted_dt','category','tagline','content','author','slug','video_url','comment','status','picture','created_by','updated_by','created_at','updated_at'];

}
