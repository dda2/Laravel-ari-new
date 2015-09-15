@extends('templates.default')

@section('content')
    <div class="jumbotron">
    @if(Auth::check())
        <h1>Selamat Datang</h1>
            <p>{{Auth::user()->getNameOrUsername() }} anda dapat melakukan input data sekolah anda </p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('signup')}}" role="button">Input Data</a></p>
    @else
        <h1>Selamat Datang</h1>
            <p>Ingin bergabung bersama kami, silahkan daftar...</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('signup')}}" role="button">Daftar</a></p>
    </div>
    @endif
@stop