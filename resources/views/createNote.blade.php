@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="{{ action('NoteController@save') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $board->id }}">
            <div class="form-group">
                <label for="title">Titulo</label>
                <input name='title' type="text" class="form-control" id="title" aria-describedby="title">
                <small id="title" class="form-text text-muted">Titulo de la nota</small>
            </div>
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection
