<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);

        $this->UserModel = new UserModel();
        
        $this->data['pageTitle'] = 'CRUD User';
        // $this->data['currentMenu'] = 'catalog';
        // $this->data['currentSubMenu'] = 'category';
    }

    public function index()
    {
        $this->data['dtUser'] = $this->UserModel->getData();
        return view('admin.user.v_index', $this->data);
    }
}
