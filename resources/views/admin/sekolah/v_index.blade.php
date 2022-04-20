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
                <a href="{{ url('/admin/sekolah/create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;Add</a>
  		        </div>
  	  		</div>
  	  		
  	      <div class="card-body">
  	        <table id="tbl-kecamatan" class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Nama Sekolah</th>
                    <th>Jenjang</th>
                    <th>Status</th>
                    <th>Kecamatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	@if($dtSekolah->count() > 0)	
                	<?php $no = 1 ?>
                	@foreach($dtSekolah as $row)
                  <tr>
                    <td>{{$no++}}</td>
                    <td><img src="{{ url('public/uploads/sekolah/'.$row['foto']) }}" alt="" width="100px"></td>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->jenjang_id}}</td>
                    <td>{{$row->status}}</td>
                    <td>{{$row->kecamatan_id}}</td>
                    <td>
                    	<a href="{{ url('admin/sekolah', $row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a>
                    	<!-- <a href="{{ url('admin/sekolah/edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    	<form action="{{ url('admin/sekolah/destroy', $row->id) }}" method="POST" style="display:inline-block">
	                      @csrf
	                      @method('DELETE')
	                      <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
	                    </form> -->
                    </td>
                    
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="6" class="text-center">Data not available</td>
	              </tr>
                  @endif
                </tbody>
              </table>
  	      </div>
  	    </div><!-- /.card -->
  	
  	  </div>
  	</div>
  </div>
</section>

@endsection
