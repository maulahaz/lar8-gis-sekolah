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
    @include('shared.msgbox', ['errors'=>$errors])    
  </div>
  <!-- /.container-fluid -->
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
          <form action="{{ url('admin/sekolah', [$updateID]) }}" class="form-horizontal" id="frm_update" name="frm_update" method="POST">
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
                  <select name="jenjang" id="jenjang" class="form-control">
                    <option value="" holder>--Please select--</option>
                    @foreach($optJenjang as $value)
                    <option value="<?= $value ?>" @if(!empty($dtSekolah) && $dtSekolah->jenjang_id == $value) selected @endif><?= $value ?></option>
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
                <div class="col-sm-6">
                  <select name="kecamatan" id="kecamatan" class="form-control">
                    <option value="" holder>--Please select--</option>
                    @foreach($optKecamatan as $row)
                    <option value="<?= $row->id ?>" @if(!empty($dtSekolah) && $dtSekolah->kecamatan_id == $row->id ) selected @endif><?= $row->nama  ?></option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat Sekolah</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat" value="{{ !empty($dtSekolah) ? $dtSekolah->alamat : old('alamat') }}" placeholder="Alamat Sekolah">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Koordinat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="posisi" name="posisi" value="{{ !empty($dtSekolah) ? $dtSekolah->posisi : old('posisi') }}" placeholder="Silahkan klik di gampar peta" readonly>
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Peta</label>
                <div class="col-sm-10">
                  <div id="map" style="width: 100%; height: 400px;"></div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="notes" ols="30" rows="10" placeholder="Keterangan">{{ !empty($dtSekolah) ? $dtSekolah->notes : old('notes') }}</textarea>
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
  </div>
  <!-- /.container-fluid -->
</section>
@push('customJs')
<script>

  var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11'
    });

  var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/satellite-v9'
    });


  var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

  var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/dark-v10'
    });

  var map = L.map('map', {
      center: [<?= $dtSekolah->posisi ?>], //-Cilegon
      zoom: 10,
      layers: [peta1]
  }); 

  var baseMaps = {
      "Grayscale": peta1,
      "Dark": peta2,
      "Satellite": peta3,
      "Streets": peta4
  };   

  L.control.layers(baseMaps).addTo(map); 

  //--Get Coordinat:
  var curLocation = [<?= $dtSekolah->posisi ?>];
  map.attributionControl.setPrefix(false);

  var marker = new L.marker(curLocation,{
    draggable: true,
  });

  map.addLayer(marker); 

  //--Coordinate on Drag n Drop:
  marker.on('dragend', function(event){
    var position = marker.getLatLng();
    marker.setLatLng(position, {
      draggable: true,
    }).bindPopup(position).update();
    $('#posisi').val(position.lat+","+position.lng).keyup();
  });

  //--Coordinate on Map clicked:
  var posisi = document.querySelector("[name=posisi]");
  map.on('click', function(event){
    var lat = event.latlng.lat;
    var lng = event.latlng.lng;
    if(!marker){
      marker = L.marker(event.latlng).addTo(map);
    }else{
      marker.setLatLng(event.latlng);
    }
    posisi.value = lat+","+lng;
  });

</script>
@endpush
@stop