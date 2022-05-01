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
        // return view('admin.dashboard', $this->data);
        
        // die();
        $role = Auth::user()->role;
        switch ($role) {
            case '1': //--User
                return redirect('my-account');
                // return view('account.v_dashboard', $this->data);
                break;
            case '88': //--Admin
                return view('admin.dashboard', $this->data);
                break;
            case '99': //--Webmaster
                return view('Webmaster.dashboard', $this->data);
                break;                
            default:
                return view('welcome', $this->data);
                break;
        }
    }
}
