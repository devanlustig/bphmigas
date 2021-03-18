@extends('adminlte::page') 
@section('content_header')
<h1>Dashboard</h1>
@stop
@section('content')

<p><strong>Selamat datang {{ $user->name }} </strong> <br>
 Anda telah melakukan login sebagai {{ $user->hak_akses }}</p>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop