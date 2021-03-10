<?php
    use Carbon\Carbon;
?>
<table class="table table-responsive" id="user-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Creado</th>
            <th>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
                    <i class="fa fa-plus"></i>
                </button>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <button type="button" class="create-user btn btn-warning fa fa-edit" data-toggle="modal" data-target="#update" data-id="{{$user->id}}">
                    </button>
                    <button type="button" class="delete-user btn btn-danger fa fa-trash" data-toggle="modal" data-target="#delete" data-id="{{$user->id}}">
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>{{ $users->links() }}</p>





