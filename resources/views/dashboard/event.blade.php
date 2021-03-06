@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">{{$event->name}}</h5>
                    <p class="card-text">{{$event->description}}</p>
                    <a href="evento/{{$event->id}}" class="btn btn-primary">Ver evento</a>
                </div>
                <div class="card-footer text-muted">
                    {{$event->event_day}}
                </div>
                <table>
                    @for($y = 1; $y <= $event->range_y; $y++)
                    <tr>
                        @for($x = 1; $x <= $event->range_x; $x++)
                            <td>{{$x}}x{{$y}} <h1><i class="text-info fas fa-id-badge"></i></h1> </td>
                        @endfor
                    </tr>
                    @endfor
                </table>
            </div>
        </div>
    </div>
</div>
@endsection