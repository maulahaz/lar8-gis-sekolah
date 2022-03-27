<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth']);

        $this->data['webTitle'] = 'Latihan Laravel';
        $this->data['pageTitle'] = 'Dashboard';
    }

    public function index()
    {
        return view('admin.dashboard', $this->data);
    }
}
