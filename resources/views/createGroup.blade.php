@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="{{ action('GroupController@save') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input name='name' type="text" class="form-control" id="name" aria-describedby="name">
                <small id="name" class="form-text text-muted">Nombre del grupo</small>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection
