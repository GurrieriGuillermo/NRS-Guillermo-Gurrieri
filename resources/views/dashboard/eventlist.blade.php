@extends('layouts.app')

@section('content')
<?php
    use Carbon\Carbon;
?>
<div class="container">
    <div class="row justify-content-center">
        @foreach($events as $event)
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="card-title">{{$event->name}}</h2>
                    <b>{{ Carbon::createFromFormat('Y-m-d H:i:s', $event->event_day)->format('l jS \\of F Y h:i:s A')}}</b>
                    <p class="card-text">{{$event->description}}</p>
                </div>
                <div class="card-footer text-muted">
                    <a href="evento/{{$event->id}}" class="btn btn-primary">Ver evento</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection