@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @php 
            $flag = True
        @endphp
        @forelse($group->users as $g)
            @if($g->pivot->user_id == Auth::user()->id)
                <h4 class="lcolordark mt-1 col-md-3 col-sm-12">{{$group->name}}  >  Tableros</h4>
                <div class="col-md-7"></div>
                <a class="btn btn-primary mb-3 col-md-2 col-sm-3" href=" {{ action('BoardController@create', ['id' => $group->id]) }}" role="button">Nuevo tablero</a>
                @php $flag = true
                @endphp
                @break
            @else
                {{$flag = False}}
            @endif
        @empty
        @endforelse
        @if(!$flag)
            <h4 class="lcolordark mt-1 col-md-3 col-sm-12">{{$group->name}}  >  Tableros</h4>
        @endif
    </div>
    <div class="row">
        <div class="card-deck col-md-10 col-sm-12">
            @foreach( $group->boards as $board )
            <div class="col-md-3 col-sm-6 p-0 mb-3">
                <div class="card text-center mx-auto" style="width: 13rem;">
                    <div class="card-body pcolor">
                        <a href="{{ action('BoardController@getNotes', ['id' => $board->id, 'group' => $group->id]) }}" class=""><h5 class="card-title text-white text-decoration-none">{{ $board->name }}</h5></a>
                        <p class="card-text text-white">{{ $board->description }}</p>
                        @if($flag)
                            <a class="btn" href=" {{ action('BoardController@delete', ['id' => $board->id]) }}" role="button"><img src="{{ asset('img/btn-delete.png') }}" alt="delete"></a>
                            <a class="btn" href=" {{ action('BoardController@config', ['id' => $board->id]) }}" role="button"><img src="{{ asset('img/btn-edit.png') }}" alt="edit"></a>
                        @endif
                    </div>
                </div>

            </div>
            @endforeach
        </div>
        <div class="col-md-2 col-sm-12 border border-dark rounded text-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $group->users as $user )
                    <tr>
                        <td>{{ $user->nick }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($flag)
                <a class="btn mb-2" href=" {{ action('GroupController@add', ['id' => $group->id]) }}" role="button"><img src="{{ asset('img/btn-add.png') }}" alt="add"></a>
            @endif
        </div>
    </div>
</div>
@endsection
