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
    {{-- 
    <div class="row"> --}}
      {{-- 
    </div>
    --}}
    {{-- Notification --}}
    <div class="row">
      <div class="col-sm-12">
        @include('shared.msgbox', ['errors'=>$errors])
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">List Data Pengguna</h3>
            <!-- <a href="{{ url('/admin/user/create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Data</a> -->
            <div class="card-tools">
              <!-- <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;Add</button> -->
            </div>
          </div>
          <div class="card-body">
            <table id="tbl-user" class="table table-hover table-striped text-nowrap">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Photo</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                @foreach($dtUser as $row)
                <tr>
                  <td>{{$no++}}</td>
                  <td>
                    @if($row->picture == null)
                    <img src="{{ url('public/images/noimage.jpg') }}" alt="" width="80px" class="img-fluid">
                    @else
                    <img src="{{ url('public/uploads/user/'.$row->picture) }}" alt="" width="80px" class="img-fluid img-circle">
                    @endif
                  </td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->role}}</td>
                  <td>{{$row->status}}</td>
                  <td>
                    <a href="{{ url('admin/user', $row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a>
                    <!-- <a href="{{ url('/admin/user/edit/'.$row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{$row->id}}"><i class="fa fa-trash"></i>&nbsp;Delete</button> -->
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

<!-- MODAL-DELETE -->
@foreach($dtUser as $dt)
<div class="modal fade" id="modal-delete-{{$dt->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title">DELETE DATA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete this data ?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
        <a href="{{ url('/admin/user/delete/'.$dt->id) }}" class="btn-sm btn-danger"><i class="fa fa-danger"></i>&nbsp;Yes, Confirm Delete</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach

@endsection