@extends('layouts.app')

@section('content')
    @include('event.create')
    @include('event.view')
    @include('event.update')
    @include('event.delete')
@endsection