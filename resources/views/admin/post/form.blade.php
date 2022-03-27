@extends('templates/adminlte/index')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ $pageTitle }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
          <li class="breadcrumb-item active">{{ $pageTitle }}</li>
        </ol>
      </div><!-- /.col -->

    </div><!-- /.row -->

    @include('shared.msgbox', ['errors'=>$errors])    

  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
        <!-- Horizontal Form -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">{{ $pageTitle }}</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
            @if (!empty($dtPosts))

            {{-- <form action="{{ url('categories', [$updateID]) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST"> --}}
            <form action="{{ route('post.update', $updateID) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST" enctype="multipart/form-data">
              {{-- <input type="hidden" name="_method" value="PUT"> --}}
              {{-- OR --}}
              @method('PATCH')
              {{-- OR --}}
              {{-- @method('PUT') --}}

            @else

            <form id="frm_create" name="frm_create" action="{{ route('post.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">  
                
            @endif

            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" value="{{ !empty($dtPosts) ? $dtPosts->title : null }}" placeholder="Title">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-6">
                  <select name="category_id" id="category_id" class="form-control">
                    <option value="" holder>--Please select--</option>
                    @foreach($dtCategories as $categ)
                    <option value="<?= $categ->id ?>" @if(!empty($dtPosts) && $dtPosts->category_id == $categ->id)selected @endif><?= $categ->name ?></option>
                    @endforeach
                  </select>
                  
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="content" id="content" rows="4">{{ !empty($dtPosts) ? $dtPosts->content : null }}</textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-6">
                  <input type="file" class="form-control" name="image" value="{{ !empty($dtPosts) ? $dtPosts->image : null }}" placeholder="Image">
                </div>
              </div>              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Save</button>
              <a href="{{ url('post') }}" class="btn btn-default">Cancel</a>
              {{-- <button type="submit" class="btn btn-default float-right">Cancel</button> --}}
            </div>
            <!-- /.card-footer -->
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
@stop