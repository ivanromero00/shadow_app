@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="{{ action('GroupController@adduser') }}">
            @csrf
            @if (session('error'))
                <div class="alert alert-warning">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('user'))
                <div class="alert alert-success">
                    {{ session('user') }}
                </div>
            @endif
            <input type="hidden" name="id" value="{{ $group->id }}">
            <div class="form-group">
                <label for="email">email</label>
                <input name='email' type="email" class="form-control" id="email" aria-describedby="email">
                <small id="email" class="form-text text-muted">Email del usuario</small>
            </div>
            <button type="submit" class="btn btn-primary">Añadir</button>
        </form>
    </div>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $group->users as $user )
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
