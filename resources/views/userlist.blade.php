@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Nick</th>
                <th scope="col">Email</th>
                <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                @isset ($single)
                    <tr>
                        <td>{{ $user[0]->name }}</td>
                        <td>{{ $user[0]->nick }}</td>
                        <td>{{ $user[0]->email }}</td>
                        <td><a class="btn mb-2" href=" {{ route('adduser', ['id_user' => $user[0]->id, 'id_group' => $group->id]) }}" role="button"><img src="{{ asset('img/btn-add.png') }}" alt="add"></a></td>
                    </tr>
                @endisset
                @isset ($multiple)
                    @foreach($user as $u)
                        <tr>
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
