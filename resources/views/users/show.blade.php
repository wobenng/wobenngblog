@extends('layouts.default')

@section('content')
 @include('shared._message')
 @include('shared._user_info', ['user' => $user])
@stop
