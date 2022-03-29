<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Web;

class WebController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth']);

        $this->WebModel = new Web();
        
        // $this->data['pageTitle'] = 'Categories';
        // $this->data['currentMenu'] = 'catalog';
        // $this->data['currentSubMenu'] = 'category';
    }

    public function index()
    {
        // dd('WebController');
        $this->data['pageTitle'] = 'Pemetaan';
        $this->data['dtKecamatan'] = $this->WebModel->getDataKecamatan();
        dd($this->data);
        // return view('web.index', $this->data);
        return view('web.map', $this->data);
    }

    public function map()
    {
        $this->data['pageTitle'] = 'Latihan Peta';
        return view('web.map', $this->data);
    }
}
