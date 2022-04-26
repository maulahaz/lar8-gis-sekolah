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
      <div class="col-12">
        <!-- Horizontal Form -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">{{ $pageTitle }}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          @if (!empty($dtUser))
          <form action="{{ url('admin/user', [$updateID]) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST">
            @method('PATCH')
            @else
          <form id="frm_create" name="frm_create" action="{{ url('admin/user') }}" method="POST" class="form-horizontal">
            @endif
            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Pengguna</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" value="{{ !empty($dtUser) ? $dtUser->username : old('username') }}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name Lengkap</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" value="{{ !empty($dtUser) ? $dtUser->name : old('name') }}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email" value="{{ !empty($dtUser) ? $dtUser->email : old('email') }}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-4">
                  <!-- Opsi: 99/Webmaster di hilangkan -->
                  <?php $optRoles = [1 => 'User', 2 => 'Supervisor', 5 => 'Manager',88=>'Admin'] ?>
                  <select name="role" id="role" class="form-control">
                    <option value="" holder>--Pilih--</option>
                    @foreach($optRoles as $key => $value)
                    <option value="<?= $key ?>" @if(!empty($dtUser) && $dtUser->role == $key ) selected @endif><?= $value  ?></option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                  <?php $optRoles = [1 => 'Active', 0 => 'In-Active'] ?>
                  <select name="status" id="status" class="form-control">
                    <option value="" holder>--Pilih--</option>
                    @foreach($optRoles as $key => $value)
                    <option value="<?= $key ?>" @if(!empty($dtUser) && $dtUser->status == $key ) selected @endif><?= $value  ?></option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Gabung</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="created_at" value="{{ !empty($dtUser) ? $dtUser->created_at : old('created_at') }}" readonly>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Save</button>
              <a href="{{ url('admin/user') }}" class="btn btn-default float-right">Cancel</a>
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