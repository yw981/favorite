@extends('layouts.app')
@section('content')
    <h1>Favorites</h1>
    <hr />
    @foreach($favorites as $favorite)
        <h2>{{ $favorite->title }}</h2>
        <favorite>
            <div class="body">
                <a href="{{ $favorite->url }}" target="_blank">{{ $favorite->url }}</a>
            </div>
        </favorite>
    @endforeach
@endsection