@extends('layouts.app')

@section('content')
<div class="container">
    <h1>UPDATEEEE</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('NoteController@update', ['id' => $note->id]) }}">
                        {{ method_field('PUT') }}
                        @csrf

                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input name='title' type="text" class="form-control" id="title" aria-describedby="title" value="{{ $note->title }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Contenido</label>
                            <textarea class="form-control" id="content" name="content" rows="3">{{ $note->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
