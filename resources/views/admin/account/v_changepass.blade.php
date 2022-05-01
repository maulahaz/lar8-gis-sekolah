@extends('templates/adminlte/index')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ $pageTitle }}</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
          <li class="breadcrumb-item active">{{ $pageTitle }}</li>
        </ol>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    @include('shared.msgbox', ['errors'=>$errors])    
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-6">
        <!-- Horizontal Form -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">{{ $pageTitle }}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ url('admin/user/'.$updateID.'/changepass') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Password Lama</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="old_pwd">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Password Baru</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="new_pwd">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Ulangi Password Baru</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="rpt_pwd">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-warning">Simpan</button>
              <a href="{{ url('admin/user/'.$updateID) }}" class="btn btn-sm btn-default">Cancel</a>
            </div>
            <!-- /.card-footer -->
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

@push('customJs')
<script></script>
@endpush

@stop