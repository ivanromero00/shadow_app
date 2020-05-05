@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Email</th>
                <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                @isset ($single)
                    <tr>
                        <th scope="row">{{ $user->id}}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>Añadir</td>
                    </tr>
                @endisset
                @isset ($multiple)
                    @foreach($user as $u)
                        <tr>
                            <th scope="row">{{ $u->id}}</th>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->surname }}</td>
                            <td>{{ $u->email }}</td>
                            <td>Boton</td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
</div>
@endsection
