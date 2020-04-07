@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @foreach( $user->groups as $group )
            <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                <p>{{ $group->name }}</p>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
