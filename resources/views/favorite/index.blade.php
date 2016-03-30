@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Favorite Sites
                <a href="{{ url('/create') }}" class="btn btn-primary btnBlack pull-right">
                    <span class="fa fa-paper-plane"></span>
                    Add New Favorites
                </a>
            </h1>
        </div>
    </div>
    <div class="container">
        @foreach($favorites as $favorite)
            <h2>{{ $favorite->title }}</h2>
            <favorite>
                <div class="body">
                    <a href="{{ $favorite->url }}" target="_blank">{{ $favorite->url }}</a>
                </div>
            </favorite>
        @endforeach
    </div>
@endsection