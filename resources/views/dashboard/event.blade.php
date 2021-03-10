
@extends('layouts.app')

@section('content')
<?php
    use Carbon\Carbon;
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="card-title">{{$event->name}}</h2>
                    <b>{{ Carbon::createFromFormat('Y-m-d H:i:s', $event->event_day)->format('l jS \\of F Y h:i:s A')}}</b>
                    
                    <p class="card-text">{{$event->description}}</p>
                </div>
                
                <table>
                    @for($x = 1; $x <= $event->range_x; $x++)
                        <tr>
                            @for($y = 1; $y <= $event->range_y; $y++)
                                <td>
                                    <h1>    
                                        @if (in_array($x . 'x' . $y , $occupiedSeats))
                                            @if (in_array($x . 'x' . $y , $occupiedSeatByUsers))
                                                <div class="text-success">
                                                    <i class="fas fa-id-badge"></i>
                                                </div>
                                            @else
                                                <div class="text-danger">
                                                    <i class="fas fa-id-badge"></i>
                                                </div>
                                            @endif
                                        @else
                                            <div class="free-seat text-info" data-seat="{{$x}}x{{$y}}" data-occupiedSeats="false">
                                                <i class="fas fa-id-badge"></i>
                                            </div>
                                        @endif
                                    </h1> 
                                </td>
                            @endfor
                        </tr>
                    @endfor
                </table>
                <div class="card-footer text-muted">
                    <a  class="btn btn-success confirm-booking">Confirmar reserva</a>
                    @csrf
                </div>
            </div>
            <br>
            <div class="card text-center">
                <div class="card-header">
                    <h4 class="card-title">Tus reservas:</h4>
                </div>
                <div class="card-body justify-content-center">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <td>Evento</td>
                                <td>Fecha de evento</td>
                                <td>Butacas reservadas</td>
                                <td>A nombre de</td>
                                <td>Fecha de reserva</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userBookings as $userBooking)
                                <tr>
                                    <td>
                                        {{$event->name}} 
                                    </td>
                                    <td>
                                        {{ Carbon::createFromFormat('Y-m-d H:i:s', $event->event_day)->format('l jS \\of F Y h:i:s A')}}
                                    </td>
                                    <td>
                                        {{$userBooking->detailBookings->count()}}
                                    </td>
                                    <td>{{Auth::user()->name}} {{Auth::user()->lastname}}</td>
                                    <td>
                                        {{ Carbon::createFromFormat('Y-m-d H:i:s', $userBooking->created_at)->format('l jS \\of F Y h:i:s A')}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script>
        $(document).ready(() => {
            $(".free-seat").click(function (e) {
                if (!$(this).data("occupiedSeats") == true) {
                    $(this).removeClass("text-info").addClass("text-success");
                    $(this).data("occupiedSeats", true);
                }else{
                    $(this).removeClass("text-success").addClass("text-info");
                    $(this).data("occupiedSeats", false);
                }
            });

            $(".confirm-booking").click(function () {
                seats = [];
                i = 0;
                $(".free-seat").each(function () {
                    if ($(".free-seat").eq(i).data("occupiedSeats") == true) {
                        seats.push($(".free-seat").eq(i).data("seat"));
                    }
                    i++;
                });
                confirmBooking(seats);
            });
            function getEventId() {
                return {{ $event->id }};
            }
            
            function confirmBooking(seats) {
                url = "/event/booking/" + getEventId()
                token = $("input[name='_token']").val();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        'seats': seats,
                        '_token': token
                    },
                })
                .always(function() {
                    window.location.reload();
                });
            }
        });
    </script>
@endsection 