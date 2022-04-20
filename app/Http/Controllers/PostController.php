<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Str;
use Session;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        
        $this->data['pageTitle'] = 'Posts';
        // $this->data['currentMenu'] = 'catalog';
        // $this->data['currentSubMenu'] = 'category';
    }

    public function index()
    {
        $this->data['dtPosts'] = Post::paginate(10);
        return view('admin.post.index', $this->data);
    }

    public function create()
    {
        $dtPosts = null;
        $this->data['dtCategories'] = Category::all();
        $this->data['dtPosts'] = $dtPosts;
        $this->data['pageTitle'] = 'Add Post';

        return view('admin.post.form', $this->data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:5',
            'category_id'=>'required',
            'content'=>'required',
            'image'=>'required',
        ]);

        $image = $request->image;
        $newImage = time().'-'.$image->getClientOriginalName();

        $post = Post::create([
            'title'  =>  $request->title,
            'slug'  =>  Str::slug($request->title),
            'category_id' =>  $request->category_id,
            'content'  =>  $request->content,
            'image'  =>  'public/uploads/post/'.$newImage,
        ]);

        $image->move('public/uploads/post/', $newImage);
        return redirect('post')->with('success', 'Well done, New data created!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // dd($dtPosts->name);
        $dtPosts = Post::findOrFail($id);
        $this->data['dtCategories'] = Category::all();
        $this->data['dtPosts'] = $dtPosts;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = 'Update Post';
        return view('admin.post.form', $this->data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|min:5',
            'category_id'=>'required',
            'content'=>'required',
        ]);

        $postedData['title'] = $request->title;
        $postedData['slug'] = Str::slug($request->title);
        $postedData['category_id'] = $request->category_id;
        $postedData['content'] = $request->content;

        if($request->has('image')){
            $image = $request->image; //--should be : $request->file('image');
            $newImage = time().'-'.$image->getClientOriginalName();
            $image->move('public/uploads/post/', $newImage);
            $postedData['image'] = 'public/uploads/post/'.$newImage;
        }

        $dtPost = Post::findOrFail($id);

        if ($dtPost->update($postedData)) {
            Session::flash('success', 'Data has been updated.');
        }
        return redirect('post');
    }

    public function destroy($id)
    {
        $dtPost = Post::findOrFail($id);
        // dd($dtPost);
        if ($dtPost->delete()) {
            Session::flash('success', 'Data has been deleted (sent to trashed bin)');
        }

        return redirect('post');
    }

    public function trashedBin()
    {
        $this->data['dtPosts'] = Post::onlyTrashed()->paginate(10);
        $this->data['pageTitle'] = 'Post Trashed Bin';
        return view('admin.post.trashedbin', $this->data);
    }

    public function restore($id)
    {
        $dtPost = Post::withTrashed()->where('id', $id)->first();
        if ($dtPost->restore()) {
            Session::flash('success', 'Data has been restored');
        }

        return redirect('post');
    }

    public function kill($id)
    {
        $dtPost = Post::withTrashed()->where('id', $id)->first();
        if ($dtPost->forceDelete()) {
            Session::flash('success', 'Data has been permanently deleted');
        }

        return redirect('post');
    }
}
