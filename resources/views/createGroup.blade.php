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
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="check" name="public" value="1">
                    <label class="form-check-label" for="exampleCheck1">Hacer el grupo público.</label>
                </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection
