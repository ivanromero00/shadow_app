@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <form method="POST" action="{{ action('GroupController@usersearch', ['id' => $group->id]) }}">
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
            <div class="row justify-content-around">
                <input type="hidden" name="id" value="{{ $group->id }}">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name='email' type="email" class="form-control" id="email" aria-describedby="email">
                    <small id="email" class="form-text text-muted">Email del usuario</small>
                </div>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input name='name' type="text" class="form-control" id="name" aria-describedby="name">
                    <small id="name" class="form-text text-muted">Nombre del usuario</small>
                </div>
                <div class="form-group">
                    <label for="surname">Nickname</label>
                    <input name='surname' type="text" class="form-control" id="nick" aria-describedby="nick">
                    <small id="nick" class="form-text text-muted">Nickname</small>
                </div>
            </div>
            <button type="submit" class="btn btn-primary justify-content-center"><img src="{{ asset('img/btn-search.png') }}" alt="delete"></button>
        </form>
    </div>
    <div class="row justify-content-center mt-3">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nick</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $group->users as $user )
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nick }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
