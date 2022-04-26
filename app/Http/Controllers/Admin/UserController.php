<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use App\Models\Roles;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        //--Yang 99/Webmaster nggak usah ditampilin:
        $this->data['dtUser'] = User::where('role','!=','99')->paginate(10);

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

    public function update(Request $request, $id)
    {
        // dd($request);
        $this->_validateData($request);

        $postedData = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
        ];

        $updated = DB::table('users')->where('id', $id)->update($postedData);
        if($updated){
            return redirect('admin/user')->with('success', 'Well done, Data has been updated.');
        }else{
            return redirect()->back()->with('error', 'Something wrong during update process. Please contact Admin.');
        }

        //--OR--
        // User::where('id',$id)->update($postedData);
        // return redirect('admin/user')->with('success', 'Well done, Data has been updated.');
    }

    public function _validateData($request)
    {
        $this->validate($request,[
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);
    }
}
