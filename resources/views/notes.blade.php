@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a class="btn btn-primary mb-3" href=" {{ action('NoteController@create', ['id' => $board->id]) }}" role="button">Crear</a>
    </div>
    <div class="row justify-content-center">
        <div class="card-deck">
            @foreach( $board->notes as $note )
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $note->title }}</h5>
                    <p class="card-text">{{ $note->content }}</p>
                    <a class="btn btn-danger" href=" {{ action('NoteController@delete', ['id' => $note->id]) }}" role="button">Borrar</a>
                    <a class="btn btn-warning" href=" {{ action('NoteController@config', ['id' => $note->id]) }}" role="button">Editar</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
