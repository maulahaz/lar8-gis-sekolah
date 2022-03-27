<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Str;
use Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        
        $this->data['pageTitle'] = 'Categories';
        // $this->data['currentMenu'] = 'catalog';
        // $this->data['currentSubMenu'] = 'category';
    }

    public function index()
    {
        $this->data['pageTitle'] = 'Categories';
        $this->data['dtCategories'] = Category::paginate(10);
        return view('admin.category.index', $this->data);
        // $dtCategories = Category::all();
        // return view('admin.category.index', compact('dtCategories'));
    }

    public function create()
    {
        $dtCategories = null;
        $this->data['dtCategories'] = $dtCategories;
        $this->data['pageTitle'] = 'Add Category';

        return view('admin.category.form', $this->data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name'          => 'required|min:3',
            // 'parent_id'     => 'required',
        ]);

        $post = Category::create([
            'name'  =>  $request->name,
            'slug'  =>  Str::slug($request->name),
        ]);
        return redirect()->back()->with('success', 'Well done, New data created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dtCategories = Category::findOrFail($id);
        // dd($dtCategories->name);
        $this->data['dtCategories'] = $dtCategories;
        $this->data['updateID'] = $id;
        // $this->data['pageTitle'] = !empty($dtCategories) ? 'Update Category' : 'Add Category';
        $this->data['pageTitle'] = 'Update Category';
        return view('admin.category.form', $this->data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request,[
            'name'          => 'required|min:3',
            // 'parent_id'     => 'required',
        ]);

        $postedData = [
            'name'  =>  $request->name,
            'slug'  =>  Str::slug($request->name),
        ];

        $dtCategory = Category::findOrFail($id);
        if ($dtCategory->update($postedData)) {
            Session::flash('success', 'Data has been updated.');
        }
        return redirect('category');

        // OR :
        // Category::whereId($id)->update($postedData);
        // return redirect('category')->with('success', 'Well done, Data has been updated.!');
    }

    public function destroy($id)
    {
        $dtCategory = Category::findOrFail($id);
        // dd($dtCategory);
        if ($dtCategory->delete()) {
            Session::flash('success', 'Data has been deleted');
        }

        return redirect('category');
    }
}
