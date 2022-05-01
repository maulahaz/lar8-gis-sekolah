<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use MHzHelper;

class MyAccountController extends Controller
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
        $this->data['pageTitle'] = 'Profil Pengguna';

        return view('account.v_show', $this->data);
        // return view('account.v_dashboard', $this->data);
    }

    public function edit($id)
    {
        $dtUser = DB::table('users')
                ->where('id', $id)
                ->first();
        $this->data['dtUser'] = $dtUser;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Perbaharui Data Pengguna';
        return view('account.v_form', $this->data);
    }

    public function update(Request $request, $id)
    {
        $this->_validateData($request);

        $postedData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $updated = DB::table('users')->where('id', $id)->update($postedData);
        if($updated){
            return redirect('my-account')->with('success', 'Selamat, Data berhasil di perbaharui.');
        }else{
            return redirect()->back()->with('error', 'Error saat penggantian Password. Silahkan hubungi Administrator.');
        }

        //--OR--
        // User::where('id',$id)->update($postedData);
        // return redirect('admin/user')->with('success', 'Well done, Data has been updated.');
    }

    public function changepass(Request $request)
    {
        $idUser = Auth::user()->id;

        if($request->isMethod('post')){
            //--Validasi:
            $this->validate($request,[
                'old_pwd' => [
                    'required',
                    function($attribute, $value, $fail){
                        if(!Hash::check($value, Auth::user()->password)){
                            $fail('Password yang lama salah!.');
                        }
                    }
                ],
                'password' => 'required|confirmed|different:old_pwd',
            ]);

            $postedData = [
                'password' => Hash::make($request->password),
                'updated_at' => date("Y-m-d H:i:s"),
            ];

            $updated = DB::table('users')->where('id', $idUser)->update($postedData);

            if ($updated) {
                return redirect('my-account')->with('success', 'Selamat, Password berhasil di ganti.');
            }else{
                return redirect()->back()->with('error', 'Error saat penggantian Password. Silahkan hubungi Administrator.');
            }
        }

        $this->data['updateID'] = $idUser;
        $this->data['pageTitle'] = 'Ganti Password';
        return view('account.v_changepass', $this->data);
    }

    public function _validateData($request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
        ]);
    }
}
