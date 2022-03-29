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
            <h3 class="card-title">Form {{ $pageTitle }}</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
            @if (!empty($dtMateri))
            <form action="{{ url('admin/materi', $updateID) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST">
              @method('PATCH')

            @else

            <form id="frm_create" name="frm_create" action="{{ url('admin/materi') }}" method="POST" class="form-horizontal">  
                
            @endif

            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Materi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" value="{{ !empty($dtMateri) ? $dtMateri->title : null }}" placeholder="Isi Judul Materi">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pengisi Materi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="author" value="{{ !empty($dtMateri) ? $dtMateri->author : null }}" placeholder="Isi Pengisi Materi">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Link Video</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="video_url" value="{{ !empty($dtMateri) ? $dtMateri->video_url : null }}" placeholder="Isi Lokasi Link Video">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="notes" id="notes" rows="4" placeholder="Isi Catatan">{{ !empty($dtMateri) ? $dtMateri->notes : null }}</textarea>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Save</button>
              <a href="{{ url('admin/materi') }}" class="btn btn-default float-right">Cancel</a>
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