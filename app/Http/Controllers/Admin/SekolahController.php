<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\Kecamatan;
use Session;

class SekolahController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        
        // $this->data['currentMenu'] = 'Admin';
        // $this->data['currentSubMenu'] = 'Sekolah';
    }

    public function index()
    {
        $this->data['pageTitle'] = 'CRUD Sekolah';

        $this->data['dtSekolah'] = Sekolah::paginate(10);
        return view('admin.sekolah.v_index', $this->data);
    }

    public function create()
    {
        $dtSekolah = null;
        $this->data['dtSekolah'] = $dtSekolah;
        $this->data['optJenjang'] = [1=>'SD', 2=>'SMP', 3=>'SMA', 4=>'Kuliah'];
        $this->data['optKecamatan'] = Kecamatan::all();
        $this->data['optSatus'] = [1=>'Negeri', 2=>'Swasta'];
        // dd($this->data);
        $this->data['pageTitle'] = 'Tambah Sekolah';

        return view('admin.sekolah.form', $this->data);
    }

    public function store(Request $request)
    {
        $this->_validateData($request);

        $post = Sekolah::create([
            'nama' => $request->nama,
            'jenjang_id' => $request->jenjang,
            'status' => $request->status,
            'kecamatan_id' => $request->kecamatan,
            'posisi' => $request->posisi,
            'alamat' => 'Alamatnya di koordinat ini : '.$request->posisi,
            'notes' => $request->notes,
        ]);
        return redirect('admin/sekolah')->with('success', 'Well done, New data created!');
    }

    public function _validateData($request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jenjang' => 'required',
            'status' => 'required',
            'kecamatan' => 'required',
            'posisi' => 'required',
        ]);
    }

    public function show($id)
    {
        $dtSekolah = Sekolah::findOrFail($id);
        $this->data['dtSekolah'] = $dtSekolah;
        $this->data['updateID'] = $id;
        $this->data['optJenjang'] = [1=>'SD', 2=>'SMP', 3=>'SMA', 4=>'Kuliah'];
        $this->data['optKecamatan'] = Kecamatan::all();
        $this->data['optSatus'] = [1=>'Negeri', 2=>'Swasta'];
        // dd($this->data);
        $this->data['pageTitle'] = 'Tambah Sekolah';

        return view('admin.sekolah.v_show', $this->data);
    }

    public function edit($id)
    {
        $dtSekolah = Sekolah::findOrFail($id);
        $this->data['dtSekolah'] = $dtSekolah;
        $this->data['updateID'] = $id;
        $this->data['optJenjang'] = [1=>'SD', 2=>'SMP', 3=>'SMA', 4=>'Kuliah'];
        $this->data['optKecamatan'] = Kecamatan::all();
        $this->data['optSatus'] = [1=>'Negeri', 2=>'Swasta'];
        $this->data['pageTitle'] = 'Update Sekolah';
        return view('admin.sekolah.form', $this->data);
    }

    public function update(Request $request, $id)
    {
        $this->_validateData($request);

        $postedData = [
            'nama' => $request->nama,
            'jenjang_id' => $request->jenjang,
            'status' => $request->status,
            'kecamatan_id' => $request->kecamatan,
            'posisi' => $request->posisi,
            'alamat' => 'Alamatnya di koordinat ini : '.$request->posisi,
            'notes' => $request->notes,
        ];

        $dtSekolah = Sekolah::findOrFail($id);
        if ($dtSekolah->update($postedData)) {
            Session::flash('success', 'Well done, Data has been updated.');
        }
        return redirect('admin/sekolah');
    }

    public function destroy($id)
    {
        $dtSekolah = Sekolah::findOrFail($id);
        // dd($dtSekolah);
        if ($dtSekolah->delete()) {
            Session::flash('success', 'Data has been deleted');
        }

        return redirect('admin/sekolah');
    }
}
