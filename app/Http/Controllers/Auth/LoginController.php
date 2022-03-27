<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
        $this->data['webTitle'] = 'Latihan Laravel';
        $this->data['pageTitle'] = 'App Login';
    }

    public function index()
    {
        return view('templates.adminlte.login', $this->data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'username'		=>'required',
            // 'email'			=>'required|email',
            'password'		=>'required',
        ]);
    	// dd($request->all());

    	if(!auth()->attempt($request->only('username', 'password'))){
    		return back()->with('error', 'Invalid login details!');
    	}

        return redirect()->route('dashboard');
    }
}
