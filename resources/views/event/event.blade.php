@extends('layouts.app')

@section('content')
    @include('event.create')
    @include('event.view')
    @include('event.update')
    @include('event.delete')
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(".create-event").click(function () {
                url = '/event/get/' + $(event.target).data("id");
                $.ajax({
                    type: "GET",
                    url: url,
                })
                .done(function(data) {
                    $(".update-form").attr("action", "/event/" + data.id);
                    $(".update-name").val(data.name);
                    $(".update-range_x").val(data.range_x);
                    $(".update-range_y").val(data.range_y);
                    $(".update-event_day").val(data.event_day);
                    $(".update-description").val(data.description);
                })
                .fail(function() {

                });
            });
            $(".delete-event").click(function () {
                $(".delete-form")
                    .attr("action", "/event/" + $(event.target).data("id"));
            });
        });
    </script>
@endsection

