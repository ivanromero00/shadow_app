@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a class="btn btn-primary mb-3" href=" {{ action('BoardController@create', ['id' => $group->id]) }}" role="button">Crear</a>
    </div>
    <div class="row justify-content-center">
        <div class="card-deck">
            @foreach( $group->boards as $board )
            <div class="card">
                <div class="card-body">
                    <a href="{{ action('BoardController@getNotes', ['id' => $board->id]) }}"><h5 class="card-title">{{ $board->name }}</h5></a>
                    <p class="card-text">{{ $board->description }}</p>
                    <a class="btn btn-danger" href=" {{ action('BoardController@delete', ['id' => $board->id]) }}" role="button">Borrar</a>
                    <a class="btn btn-warning" href=" {{ action('BoardController@config', ['id' => $board->id]) }}" role="button">Editar</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
