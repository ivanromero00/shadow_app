@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-deck">
            @foreach( $user->groups as $group )
            <div class="card">
                <div class="card-body">
                    <a href="{{ action('GroupController@getBoards', ['id' => $group->id]) }}"><h5 class="card-title">{{ $group->name }}</h5></a>
                    <a class="btn btn-danger" href=" {{ action('GroupController@delete', ['id' => $group->id]) }}" role="button">Borrar</a>
                    <a class="btn btn-warning" href=" {{ action('GroupController@config', ['id' => $group->id]) }}" role="button">Editar</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
