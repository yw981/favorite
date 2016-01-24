@extends('layouts.app')
@section('content')
    <h1>Favorites</h1>
    <hr />
    @foreach($favorites as $favorite)
        <h2>{{ $favorite->title }}</h2>
        <favorite>
            <div class="body">
                <a href="">{{ $favorite->url }}</a>
            </div>
        </favorite>
    @endforeach
@endsection