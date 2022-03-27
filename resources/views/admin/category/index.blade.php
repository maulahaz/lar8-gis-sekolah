@extends('templates/adminlte/index')
@section('content')
<!-- CUSTOM STYLE -->
<!--================================================================-->
<style>
  th, td{ text-align: center; }
  .logo {
    width: 100px;
  }
  .logo img{ width: 100%;}
</style>
<!-------------------------------------------------------------------->

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
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-6">
        <!-- Horizontal Form -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">List Category</h3>
            <div class="float-right">
              {{-- <a href="#" data-toggle="modal" data-target="#modal_create_category" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
              <i class="glyphicon glyphicon-plus"></i> Create New</a> --}}
              <a href="{{ route('category.create') }}" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i> Create New</a>
            </div>
            
          </div>
          <div class="card-body p-0">
            <table class="table table-sm">
              <thead class=" text-primary">
                <th>No.</th>
                <th>Name</th>
                <th>Parent ID</th>
                <th>Action</th>
              </thead>
              <tbody>
              @if(count($dtCategories) > 0)
                @foreach($dtCategories as $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="text-left">{{ $row->name }}</td>
                  <td>{{ $row->parent_id }}</td>
                  <td>                   
                    <form action="{{ route('category.destroy', $row->id) }}" method="POST" style="display:inline-block">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('category.edit', $row->id) }}" class="btn btn-warning btn-sm">edit</a>
                      <button type="submit" class="btn-danger btn-sm">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4">Data not available</td>
                </tr>
              @endif
              </tbody>
            </table>
            <hr>  
            <div class="pagination p-1 float-right">
              {{ $dtCategories->links() }}
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>      
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>

{{-- @include('categories.modal_create_category') --}}

@endsection
