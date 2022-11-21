@if ($errors->any())
	<div class="alert alert-danger" id="alert" role="alert">
		<div class="font-weight-bold">Oops! Une erreur détectée.....</div>
		<ul class="mb-0">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

@if (session()->get('success'))
	<div class="alert alert-success" role="alert">
		{{ session()->get('success') }}
	</div>
@endif
