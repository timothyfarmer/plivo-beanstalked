@extends('layouts.app')
@section('content')
	@if(session()->has('notif'))
	    <div class="alert-success text-center" id="notif">
	    	{{ session()->get('notif') }}<i id="removeNotification" class="glyphicon glyphicon-remove pull-right"></i>
	    </div>
	@endif
	
	<div class=" col-md-6 col-md-offset-3">
    <table class="table table-striped table-hover">
	    <thead>
		    <tr>
		    	<th>To Number</th>
		    	<th>From Number</th>
		    	<th>Message</th>
			</tr>
	    </thead>
        @foreach($messages as $message)
			<tr class="success"><td>{{$message->to_number}}</td><td>{{$message->from_number}}</td><td>{{$message->message}}</td></tr>
		@endforeach
		
	</table>
	<hr>
		<form method="POST" action="/messages/{{Auth::user()->id}}/create">
			{{csrf_field()}}
			<div class="form-group">
				<textarea name="message" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Send Text</button>
			</div>
		</form>
	</div>


	
@stop