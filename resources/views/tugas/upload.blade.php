@extends('templates.frontend')
@section('isi')

<div class="container">
	<div class="row">
      <div class="col-sm-12">
        @include('shared.msgbox', ['errors'=>$errors])
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <!-- Horizontal Form -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Form {{ $pageTitle }}</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
          <form id="frm_upload" name="frm_upload" action="{{ url('tugas/upload') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">  

            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="upload_file">Upload Tugas File</label>
                <div class="col-sm-5">
                	<div class="input-group">
	                  <div class="custom-file">
	                    <input type="file" class="custom-file-input" id="upload_file" name="upload_file">
	                    <label class="custom-file-label" for="upload_file">Choose file</label>
	                  </div>
	                </div>
                </div>
              </div>
              <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Materi</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="title" value="" placeholder="Isi Judul Materi">
                </div>
              </div> -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Save</button>
              <a href="{{ url('admin/materi') }}" class="btn btn-default">Cancel</a>
            </div>
            <!-- /.card-footer -->
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
</div>


@endsection
