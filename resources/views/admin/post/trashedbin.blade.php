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
      <div class="col-12">
        <!-- Horizontal Form -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">List Post</h3>
            <div class="float-right">
              <a href="{{ route('post.create') }}" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i> Create New</a>
            </div>
            
          </div>
          <div class="card-body p-0">
            <table class="table table-sm">
              <thead class=" text-primary">
                <th>No.</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>
              </thead>
              <tbody>
              @if(count($dtPosts) > 0)
                @foreach($dtPosts as $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="text-left">{{ $row->title }}</td>
                  <td>{{ $row->content }}</td>
                  <td>{{ $row->category->name }}</td>
                  <td><img src="{{ url($row->image) }}" alt="" class="img-fluid" style="width:150px"></td>
                  <td>                   
                    <form action="{{ route('post.kill', $row->id) }}" method="POST" style="display:inline-block">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('post.restore', $row->id) }}" class="btn btn-warning btn-sm">Restore</a>
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
              {{ $dtPosts->links() }}
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>      
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>

{{-- @include('post.pop_create_post') --}}

@endsection
