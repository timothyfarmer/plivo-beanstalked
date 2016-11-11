@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(session()->has('notif'))
                <div class="alert-success text-center" id="notif">{{ session()->get('notif') }} <i id="removeNotification" class="glyphicon glyphicon-remove pull-right"></i></div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                        
                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
