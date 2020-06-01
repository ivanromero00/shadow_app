@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h4 class="lcolordark mt-1 col-2">Grupos</h4>
        <div class="col-md-8"></div>
        <a class="btn btn-primary col-md-2 col-sm-3" href=" {{ action('GroupController@create') }}" role="button">Nuevo Grupo</a>
    </div>
    <div class="row mt-3">
        <div class="card-deck col-10">
            @foreach( $user->groups as $group )
            <div class="col-md-3 p-0 mb-3">
                <div class="card text-center" style="width: 13rem;">
                    <div class="card-body pcolor">
                        <a href="{{ action('GroupController@getBoards', ['id' => $group->id]) }}"><h5 class="card-title text-white">{{ $group->name }}</h5></a>
                        <a class="btn" href=" {{ action('GroupController@delete', ['id' => $group->id]) }}" role="button"><img src="{{ asset('img/btn-delete.png') }}" alt="delete"></a>
                        <a class="btn" href=" {{ action('GroupController@config', ['id' => $group->id]) }}" role="button"><img src="{{ asset('img/btn-edit.png') }}" alt="edit"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection
