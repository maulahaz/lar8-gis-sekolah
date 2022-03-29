<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Str;
use Session;

class MHzController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth']);
        
        $this->data['pageTitle'] = 'Posts';
        // $this->data['currentMenu'] = 'catalog';
        // $this->data['currentSubMenu'] = 'category';
    }

    public function index()
    {
        echo Hash::make('pass123');
    }

}
