@extends('templates.frontend')
@section('isi')

<div class="container">
  <div class="row">
    <div class="col-12">
      @include('shared.msgbox', ['errors'=>$errors])
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">{{ $pageTitle }}</h3>
        </div>
        <form action="{{ url('my-account', [$updateID]) }}" class="form-horizontal" method="POST">
          @method('PATCH')
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
                <input type="text" class="form-control" name="name" value="{{ !empty($dtUser) ? $dtUser->name : old('name') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Alamat Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="email" value="{{ !empty($dtUser) ? $dtUser->email : old('email') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Level</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="role" value="{{ !empty($dtUser) ? $dtUser->role : old('role') }}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="status" value="{{ !empty($dtUser) ? $dtUser->status : old('status') }}" readonly>
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
            <button type="submit" class="btn btn-sm btn-info">Simpan</button>
            <a href="{{ url('my-account') }}" class="btn btn-sm btn-outline-info">Batal</a>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>

<script>

</script>

@endsection
