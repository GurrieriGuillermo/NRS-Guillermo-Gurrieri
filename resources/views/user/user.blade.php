@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                @include('user.create')
                @include('user.view')
                @include('user.update')
                @include('user.delete')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(".create-user").click(function () {
                url = '/user/get/' + $(event.target).data("id");
                $.ajax({
                    type: "GET",
                    url: url,
                })
                .done(function(data) {
                    $(".update-form").attr("action", "/user/" + data.id);
                    $(".update-name").val(data.name);
                    $(".update-lastname").val(data.lastname);
                    $(".update-email").val(data.email);
                    $(".update-password").val(data.password);
                    $(".update-password_confirm").val(data.password_confirm);
                })
                .fail(function() {

                });
            });
            $(".delete-user").click(function () {
                $(".delete-form")
                    .attr("action", "/user/" + $(event.target).data("id"));
            });
        });
    </script>
@endsection

