@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($events as $event)
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">{{$event->name}}</h5>
                    <p class="card-text">{{$event->description}}</p>
                    <a href="evento/{{$event->id}}" class="btn btn-primary">Ver evento</a>
                </div>
                <div class="card-footer text-muted">
                    {{$event->event_day}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection