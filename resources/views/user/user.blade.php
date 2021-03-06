@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>lastname</th>
                <th>email</th>
                <th>created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection