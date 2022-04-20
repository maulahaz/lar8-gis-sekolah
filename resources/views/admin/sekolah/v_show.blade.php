@extends('templates/adminlte/index')
@section('content')

<div class="content-header">
  <div class="container-fluid">
  	<div class="row">
        <div class="col-sm-12">
        <h1>{{ $pageTitle }}</h1>
        <span class="smaller hide-sm">(Record ID: <?= $updateID ?>)</span>
        <div class="row" id="msgBox">
          <div class="col-sm-12">
            @include('shared.msgbox', ['errors'=>$errors]) 
          </div>  
        </div>
        <div class="card mt-3">
          <div class="card-header">
            <h3 class="card-title">Options</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          	<a href="{{ url('admin/sekolah') }}" class="btn btn-sm btn-outline-info"><i class="fa fa-chevron-left"></i> &nbsp;View All Data</a>
          	<a href="{{ url('admin/sekolah/'.$updateID.'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> &nbsp;Update Data</a>
          	<button class="btn btn-danger btn-sm float-right" id="btn-delete-modal" data-toggle=modal data-target="#delete-modal"><i class="fa fa-trash"></i> &nbsp;Delete</button>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </div>
    <div class="row mb-2">
    	<!-- DATA -->
		<div class="col-sm-8">
		    <div class="card">
		        <div class="card-header">
		            <h3 class="card-title">Data Details</h3>
		        </div>
		        <!-- /.card-header -->
		        <div class="card-body">
		            <div class="record-details">
		                <dl class="row">
		                    <dt class="col-sm-3">Nama Sekolah</dt>
		                    <dd class="col-sm-9">: {{ $dtSekolah['nama']}} </dd>
		                    <dt class="col-sm-3">Jenjang</dt>
		                    <dd class="col-sm-9">: {{ $dtSekolah['jenjang_id'] }}</dd>
		                    <dt class="col-sm-3">Status</dt>
		                    <dd class="col-sm-9">: {{ $dtSekolah['status'] }}</dd>
		                    <dt class="col-sm-3">Kecamatan</dt>
		                    <dd class="col-sm-9">: {{ $dtSekolah['kecamatan_id'] }}</dd>
		                </dl>
		            </div>
		        </div>
		        <!-- /.card-body -->
		    </div>
		    <!-- /.card -->
		</div>
		<!-- PICTURE -->
		<div class="col-sm-4">
		    <div class="card">
		        <div class="card-header">
		            <h3 class="card-title">Gambar</h3>
		        </div>
		        <!-- /.card-header -->
		        <div class="card-body">
		            <?php if ($dtSekolah['foto'] == null) : ?>
	            	<form id="frm_upload" name="frm_upload" action="{{ url('admin/sekolah/upload-file/'.$updateID) }}" method="POST" class="form-horizontal" enctype="multipart/form-data"> 
            		@csrf
		            <p class="text-center">Gambar belum ada.</p>
		            <p class="text-center">Silahkan pilih gambar kemudian tekan UPLOAD.</p>
		            <div class="input-group mb-2">
		                <div class="custom-file">
		                	<input type="hidden" name="foto_hide">
                            <input type="file" class="custom-file-input" id="foto" name="foto" onchange="preview()" accept="image/*,.pdf">
                            <label class="custom-file-label" for="foto">Masukan File Gambar</label>
		                </div>
		            </div>
		            <button type="submit" class="btn btn-sm btn-info btn-block">Upload</button>
		           	</form>
		            <?php else: ?>
		            <div class="text-center">
		                <p><button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete-picture-modal"><i class="fa fa-trash"></i> Delete Foto</button></p>
		                <p style="text-align: center; display: inline-block;">
		                    <img src="{{ url('public/uploads/sekolah/'.$dtSekolah['foto']) }}" alt="picture preview" class="img-fluid">
		                </p>
		            </div>
		            <?php endif; ?>
		        </div>
		        <!-- /.card-body -->
		    </div>
		    <!-- /.card -->
		</div>

    </div><!-- /.row -->   

  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- DELETE PICTURE -->
<!-- ===================================================== -->
<div class="modal fade" id="delete-picture-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <form id="frm_delete" name="frm_delete" action="{{ url('admin/sekolah/remove-file/'.$updateID) }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Delete Picture</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure?</p>
          <p>You are about to delete the picture.  This cannot be undone. Do you really want to do this?</p> 
        </div>
        <div class="modal-footer justify-content-between">
        	<button class="btn btn-sm btn-outline-info" data-dismiss="modal">Cancel</button>
        	<button type="submit" class="btn btn-sm btn-danger">Yes - Delete Now</button>
        </div>
      </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@push('customJs')
<script>

</script>
@endpush

@stop