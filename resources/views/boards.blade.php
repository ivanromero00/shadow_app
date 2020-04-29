@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h4 class="lcolordark mt-1 col-3">{{$group->name}}  >  Tableros</h4>
        <div class="col-8"></div>
        <a class="btn btn-primary mb-3 col-1" href=" {{ action('BoardController@create', ['id' => $group->id]) }}" role="button">Crear</a>
    </div>
    <div class="row">
        <div class="card-deck col-10">
            @foreach( $group->boards as $board )
            <div class="col-md-3 col-sm-2 p-0 mb-3">
                <div class="card text-center" style="width: 13rem;">
                    <div class="card-body pcolor">
                        <a href="{{ action('BoardController@getNotes', ['id' => $board->id]) }}" class=""><h5 class="card-title text-white text-decoration-none">{{ $board->name }}</h5></a>
                        <p class="card-text">{{ $board->description }}</p>
                        <a class="btn" href=" {{ action('BoardController@delete', ['id' => $board->id]) }}" role="button"><img src="{{ asset('img/btn-delete.png') }}" alt="delete"></a>
                        <a class="btn" href=" {{ action('BoardController@config', ['id' => $board->id]) }}" role="button"><img src="{{ asset('img/btn-edit.png') }}" alt="edit"></a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
        <div class="col-2 border border-dark rounded text-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $group->users as $user )
                    <tr>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn mb-2" href=" {{ action('GroupController@add', ['id' => $group->id]) }}" role="button"><img src="{{ asset('img/btn-add.png') }}" alt="add"></a>
        </div>
    </div>
</div>
@endsection
