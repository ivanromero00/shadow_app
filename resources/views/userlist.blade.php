@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nick</th>
                <th scope="col">Email</th>
                <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                @isset ($single)
                    <tr>
                        <th scope="row">{{ $user->id}}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nick }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a class="btn mb-2" href=" {{ route('adduser', ['id_user' => $user->id, 'id_group' => $group->id]) }}" role="button"><img src="{{ asset('img/btn-add.png') }}" alt="add"></a></td>
                    </tr>
                @endisset
                @isset ($multiple)
                    @foreach($user as $u)
                        <tr>
                            <th scope="row">{{ $u->id}}</th>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->nick }}</td>
                            <td>{{ $u->email }}</td>
                            <td><a class="btn mb-2" href=" {{ route('adduser', ['id_user' => $u->id, 'id_group' => $group->id]) }}" role="button"><img src="{{ asset('img/btn-add.png') }}" alt="add"></a></td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
</div>
@endsection
