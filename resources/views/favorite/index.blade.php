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
        @foreach($tags as $tag)
            <a href="{{ url('/tag/'.$tag->id) }}"><span class="label @if($tag->id == @$curTagId) label-success @else label-default @endif" onclick="select(this)">{{ $tag->name  }}</span></a>
        @endforeach

        @foreach($favorites as $favorite)
            <h2>{{ $favorite->title }}</h2>

            <favorite>
                    <span>{{ $favorite->created_at->diffForHumans() }}</span>
                    @if($favorite->tags)
                        @foreach($favorite->tags as $tag)
                            <span class="badge">{{ $tag->name }}</span>
                        @endforeach
                    @endif
                <div class="body">
                    <a href="{{ $favorite->url }}" target="_blank">{{ $favorite->url }}</a>
                </div>
            </favorite>
        @endforeach
    </div>


@endsection
