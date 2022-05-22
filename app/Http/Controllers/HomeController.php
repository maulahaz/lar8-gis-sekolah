<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Trainers;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth']);
        
        // $this->data['pageTitle'] = 'Categories';
        // $this->data['currentMenu'] = 'catalog';
        // $this->data['currentSubMenu'] = 'category';
    }

    public function index()
    {
        $this->data['pageTitle'] = 'Homepage';

        //--Data Kursus:
        $dtCourses = DB::table('tbl_courses as crs')
            ->join('tbl_trainers as trn', 'trn.id', '=', 'crs.author')
            ->select('*', 'trn.name as author', 'crs.picture as course_pict','trn.picture as trainer_pict')
            // ->where('hr_leave.oid', $id)
            ->get();
        $this->data['dtCourses'] = $dtCourses;    

        //--Data Trainers:
        $this->data['dtTrainers'] = Trainers::all();
        // dd($this->data);
        return view('templates/edustage/homepage', $this->data);
    }

}
