@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        @if ($user[0]->image_path == 'defecto')
            <img src="{{ asset('img/perfildeusuario.jpg') }}" alt="avatar" width="200 px" class="rounded-circle">
        @else
            <img src="{{ action('UserController@getAvatar', ['filename' => $user[0]->image_path]) }}" alt="avatar" width="200 px" class="rounded-circle col-md-4">
        @endif

        <div class="col-md-4 ml-4">
            <span class="font-weight-bold row">Nombre: </span>{{ $user[0]->name }}
            <span class="font-weight-bold row">Nick: </span>{{ $user[0]->nick }}
            <span class="font-weight-bold row">Email: </span>{{ $user[0]->email }}
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
    
    </div>
</div>
@endsection
