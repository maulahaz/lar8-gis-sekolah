<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        
        // $this->data['currentMenu'] = 'Admin';
        // $this->data['currentSubMenu'] = 'Materi';
    }

    public function uploadForm()
    {
    	// die('Tugas Upload Form');
        $this->data['pageTitle'] = 'Upload Tugas';
        return view('tugas.upload', $this->data);
    }

    public function submitUpload(Request $request)
    {
    	// die('submitUpload');
    	$this->validate($request,[
            'upload_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,rar,zip|max:2048',
        ]);

    	$file = $request->upload_file;
        $newFileName = time().'-'.$file->getClientOriginalName();
        $file->move('public/uploads/tugas/', $newFileName);
        return redirect()->back()->with('success', 'Well done, New data created!');

    	// $newFileName->store('public/uploads/tugas');
    	// $request->upload_file->store('public/uploads/tugas');
        // $msg = 'Selamat, File berhasil di upload.';
        // return $msg;
    }

}
