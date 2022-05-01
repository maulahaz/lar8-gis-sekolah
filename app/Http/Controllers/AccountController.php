<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MHzHelper;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        
        // $this->data['pageTitle'] = 'CRUD User';
        // $this->data['currentMenu'] = 'catalog';
        // $this->data['currentSubMenu'] = 'category';
    }

    public function index()
    {
        $dtUser = DB::table('users')
                ->where('username', Auth()->user()->username)
                ->get()->first();
        // dd($dtUser);
        // MHzHelper::json($dtUser,true);
        $this->data['dtUser'] = (array) $dtUser;
        $this->data['updateID'] = Auth()->user()->id;
        // dd($this->data);
        $this->data['pageTitle'] = 'Data Detail Pengguna';

        return view('admin.account.v_show', $this->data);
    }

    public function edit($id)
    {
        $dtUser = DB::table('users')
                ->where('id', $id)
                ->first();
        $this->data['dtUser'] = $dtUser;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Perbaharui Data Pengguna';
        return view('admin.account.v_form', $this->data);
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

    public function changepass(Request $request, $id)
    {
        if($request->isMethod('post')){
            dd($request);
        }
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Ganti Password';
        return view('admin.account.v_changepass', $this->data);
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
