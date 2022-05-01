@extends('templates.frontend')
@section('isi')

<div class="container">
	<div class="row">

		<!-- SIDE MENU -->
		<div class="col-md-3">
			<div class="list-group">
			  <button type="button" class="list-group-item list-group-item-action active">
			    Menu
			  </button>
			  <button type="button" class="list-group-item list-group-item-action">Profile</button>
			  <button type="button" class="list-group-item list-group-item-action">Change Password</button>
			</div>
		</div>

		<!-- MENU CONTENT -->
	  <div class="col-md-9">
	  	<div class="card">
			  <div class="card-header">
			    Profile
			  </div>
			  <div class="card-body">
			    <h5 class="card-title">Special title treatment</h5>
			    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
			  </div>
			</div>
	  </div>

	</div>
</div>

<script>

</script>

@endsection
