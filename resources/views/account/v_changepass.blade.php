@extends('templates.frontend')
@section('isi')

<div class="container">
  <div class="row">
    <div class="col-6">
      @include('shared.msgbox', ['errors'=>$errors])
      <!-- Horizontal Form -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ $pageTitle }}</h3>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('my-account/changepass') }}" method="POST" class="form-horizontal">
          {{ csrf_field() }}
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Password Lama</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="old_pwd" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Password Baru</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Ulangi Password Baru</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-warning">Simpan</button>
            <a href="{{ url('my-account') }}" class="btn btn-sm btn-default">Cancel</a>
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
