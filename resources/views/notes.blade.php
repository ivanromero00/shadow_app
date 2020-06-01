@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h4 class="lcolordark mt-1 col-md-3 col-sm-12">{{$board->name}}  >  Notas</h4>
        <div class="col-md-8"></div>
        <a class="btn btn-primary mb-3 col-md-1 col-sm-12" href=" {{ action('NoteController@create', ['id' => $board->id]) }}" role="button">Nueva nota</a>
    </div>
    <div class="row">
        <div class="card-deck col-10">
            @foreach( $board->notes as $note )
            <div class="col-md-3 col-sm-2 p-0 mb-3">
                <div class="card text-center" style="width: 13rem;">
                    <div class="card-body pcolor">
                        @if($note->image_path != 'clean')
                            <img src="{{ action('NoteController@getImage', ['filename' => $note->image_path]) }}" alt="avatar" class="card-img-top">
                        @endif
                        <h5 class="card-title text-white mt-2">{{ $note->title }}</h5>
                        <p class="card-text text-white">{{ $note->content }}</p>
                        <a class="btn" href=" {{ action('NoteController@delete', ['id' => $note->id]) }}" role="button"><img src="{{ asset('img/btn-delete.png') }}" alt="delete"></a>
                        <a class="btn" href=" {{ action('NoteController@config', ['id' => $note->id]) }}" role="button"><img src="{{ asset('img/btn-edit.png') }}" alt="edit"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
