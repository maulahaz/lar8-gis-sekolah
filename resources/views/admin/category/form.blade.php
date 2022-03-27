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
      <div class="col-6">
        <!-- Horizontal Form -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">{{ $pageTitle }}</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
            @if (!empty($dtCategories))

            {{-- <form action="{{ url('categories', [$updateID]) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST"> --}}
            <form action="{{ route('category.update', $updateID) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST">
              {{-- <input type="hidden" name="_method" value="PUT"> --}}
              {{-- OR --}}
              @method('PATCH')
              {{-- OR --}}
              {{-- @method('PUT') --}}

            @else

            <form id="frm_create" name="frm_create" action="{{ route('category.store') }}" method="POST" class="form-horizontal">  
                
            @endif

            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" value="{{ !empty($dtCategories) ? $dtCategories->name : null }}" placeholder="Category Name">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Parent ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="parent_id" value="{{ !empty($dtCategories) ? $dtCategories->parent_id : null }}" placeholder="Parent Category">
                </div>
              </div>              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Save</button>
              <a href="{{ url('category') }}" class="btn btn-default">Cancel</a>
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