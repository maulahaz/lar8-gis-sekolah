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
		                    <dd class="col-sm-9">: {{ $dtSekolah['nama'] }}</dd>
		                    <dt class="col-sm-3">Jenjang</dt>
		                    <dd class="col-sm-9">: {{ $dtSekolah['jenjang_id'] }}</dd>
		                    <dt class="col-sm-3">Status</dt>
		                    <dd class="col-sm-9">: {{ $dtSekolah['status'] }}</dd>
		                    <dt class="col-sm-3">Kecamatan</dt>
		                    <dd class="col-sm-9">: {{ $dtSekolah['kecamatan'] }}</dd>
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
		            <?php if ($dtSekolah['foto'] != null) : ?>
	            	<form id="frm_upload" name="frm_upload" action="{{ url('admin/sekolah') }}" method="POST" class="form-horizontal"> 
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
		                <p style="width:200px; text-align: center; display: inline-block;">
		                    <img src="{{ url('uploads/sekolah/'.$dtSekolah['foto']) }}" alt="picture preview" class="img-fluid">
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

@push('customJs')
<script>

</script>
@endpush

@stop