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
            @if (!empty($dtSekolah))
            <form action="{{ url('admin/sekolah/create', [$updateID]) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST">
              @method('PATCH')

            @else

            <form id="frm_create" name="frm_create" action="{{ url('admin/sekolah') }}" method="POST" class="form-horizontal">  
                
            @endif

            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" value="{{ !empty($dtSekolah) ? $dtSekolah->nama : old('nama') }}" placeholder="Nama Sekolah">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenjang</label>
                <div class="col-sm-6">
                  <select name="jenjang_id" id="jenjang_id" class="form-control">
                    <option value="" holder>--Please select--</option>
                    @foreach($optJenjang as $key => $value)
                    <option value="<?= $key ?>" @if(!empty($dtSekolah) && $dtSekolah->jenjang_id == $key) selected @endif><?= $value ?></option>
                    @endforeach
                  </select>
                  
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-6">
                  <select name="status" id="status" class="form-control">
                    <option value="" holder>--Please select--</option>
                    @foreach($optSatus as $key => $value)
                    <option value="<?= $key ?>" @if(!empty($dtSekolah) && $dtSekolah->status == $key) selected @endif><?= $value ?></option>
                    @endforeach
                  </select>
                  
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kecamatan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kecamatan" value="{{ !empty($dtSekolah) ? $dtSekolah->kecamatan : old('kecamatan') }}" placeholder="Kecamatan">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Save</button>
              <a href="{{ url('admin/sekolah') }}" class="btn btn-default float-right">Cancel</a>
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

@push('customJs')
<script>

</script>
@endpush

@stop