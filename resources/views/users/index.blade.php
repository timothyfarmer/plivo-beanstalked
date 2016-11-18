@extends('layouts.app')
@section('content')
<div class=" col-md-6 col-md-offset-3">
	<form method="PATCH" action="/users/{{ Auth::user()->id }}/update">
			{{csrf_field()}}
			{{ method_field('PATCH') }}
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" value="{{ Auth::user()->name }}/>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Send Text</button>
			</div>
		</form>
</div>
@stop