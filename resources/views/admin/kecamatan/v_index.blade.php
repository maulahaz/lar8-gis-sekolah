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

    {{-- <div class="row"> --}}
      
            
    {{-- </div> --}}

    {{-- Notification --}}
    <div class="row">
      <div class="col-sm-12">
        @include('shared.msgbox', ['errors'=>$errors])
      </div>
    </div>



  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
  	<div class="row">
  	  <div class="col-lg-12">
  	  	<div class="card card-primary card-outline">
  	  		<div class="card-header">
  	  			<h3 class="card-title">Data {{ $pageTitle }}</h3>
  	  			<div class="card-tools">
  		        	<!-- <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;Add</button> -->
                <a href="{{ url('/admin/kecamatan/create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;Add</a>
  		        </div>
  	  		</div>
  	  		
  	      <div class="card-body">
  	        <table id="tbl-kecamatan" class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Geo Json</th>
                    <th>Warna</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $no = 1 ?>
                	@foreach($dtKecamatan as $row)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->geojson}}</td>
                    <td>{{$row->warna}}</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
  	      </div>
  	    </div><!-- /.card -->
  	
  	  </div>
  	</div>
  </div>
</section>

@endsection
