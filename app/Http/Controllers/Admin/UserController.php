<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);

        $this->UserModel = new UserModel();
        
        // $this->data['pageTitle'] = 'CRUD User';
        // $this->data['currentMenu'] = 'catalog';
        // $this->data['currentSubMenu'] = 'category';
    }

    public function index()
    {
        // $this->data['dtUser'] = $this->UserModel->getData();
        $this->data['dtUser'] = User::paginate(10);
        $this->data['pageTitle'] = 'Atur Data Pengguna';
        return view('admin.user.v_index', $this->data);
    }

    public function create()
    {
        $dtUser = null;
        $this->data['dtUser'] = $dtUser;
        // dd($this->data);
        $this->data['pageTitle'] = 'Tambah Data Pengguna';
        return view('admin.user.form', $this->data);
    }

    public function show($id)
    {
        $dtUser = User::findOrFail($id);
        $this->data['dtUser'] = $dtUser;
        $this->data['updateID'] = $id;
        // dd($this->data);
        $this->data['pageTitle'] = 'Data Detail Pengguna';

        return view('admin.user.v_show', $this->data);
    }

    public function edit($id)
    {
        $dtUser = User::findOrFail($id);
        $this->data['dtUser'] = $dtUser;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Perbaharui Data Pengguna';
        return view('admin.user.form', $this->data);
    }
}
