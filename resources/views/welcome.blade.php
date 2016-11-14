@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(session()->has('notif'))
                <div class="alert-success text-center" id="notif">{{ session()->get('notif') }} <i id="removeNotification" class="glyphicon glyphicon-remove pull-right"></i></div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading text-center">Welcome</div>
                        
                <div class="panel-body">
                    Please login or create a user to see a demo of Timothy's work! Thanks for stopping by.
                </div>
            </div>
        </div>
    </div>
</div>
@stop

