@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if ($user[0]->image_path == 'defecto')
            <img src="{{ asset('img/perfildeusuario.jpg') }}" alt="avatar" class="rounded-circle col-md-2 ml-auto">
        @else
            <img src="{{ action('UserController@getAvatar', ['filename' => $user[0]->image_path]) }}" alt="avatar" width="200 px" class="rounded-circle ml-auto">
        @endif

        <div class="col-md-2 ml-4 mr-auto">
            <span class="font-weight-bold row">Nombre: </span>{{ $user[0]->name }}
            <span class="font-weight-bold row">Nick: </span>{{ $user[0]->nick }}
            <span class="font-weight-bold row">Email: </span>{{ $user[0]->email }}
        </div>
    </div>
    <div class="my-3">
        <h3>Tableros publicos de {{ $user[0]->name }}</h3>
    </div>
    <div class="row">
        <div class="card-deck col-12">
            @foreach( $user[0]->groups as $group )
                @if($group->public == 1)
                    <div class="col-md-3 col-sm-6 p-0 mb-3">
                        <div class="card text-center mx-auto" style="width: 14rem;">
                            <div class="card-body pcolor">
                                <a href="{{ action('GroupController@getBoards', ['id' => $group->id]) }}"><h5 class="card-title text-white">{{ $group->name }}</h5></a>
                                <a class="btn" href=" {{ action('GroupController@delete', ['id' => $group->id]) }}" role="button"><img src="{{ asset('img/btn-delete.png') }}" alt="delete"></a>
                                <a class="btn" href=" {{ action('GroupController@config', ['id' => $group->id]) }}" role="button"><img src="{{ asset('img/btn-edit.png') }}" alt="edit"></a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
