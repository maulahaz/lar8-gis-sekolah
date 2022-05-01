<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Str;
use Session;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);

        $this->data['webTitle'] = 'Latihan Laravel';
        $this->data['pageTitle'] = 'App Registration';
    }

    public function index()
    {
        return view('templates.adminlte.register', $this->data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'			=>'required|min:5|max:50',
            'username'		=>'required|min:5|max:50',
            'email'			=>'required|email|max:50',
            'password'		=>'required|confirmed',
        ]);
    	// dd($request->all());

        $user = User::create([
            'name'  		=>  $request->name,
            'username' 		=>  $request->username,
            'email'         =>  $request->email,
            'password'      =>  Hash::make($request->password),
            'picture'       =>  'user.png',
            'role'          =>  '1',
            'status'        =>  '1',
            // 'created_at'  	=>  date('Y-m-d H:i:s'),
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }
}
