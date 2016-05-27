@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                <div class="form-group">
                    <h1>添加标签</h1>
                    <a href="{{ url('/create') }}" class="pull-right">
                        <button type="button" class="btn btn-info">返回添加收藏</button>
                    </a>
                </div>
                @if(count($tags)>0)
                    <h4>Tags:
                        @foreach($tags as $tag)
                            <a href="{{ url('/tag/'.$tag->id) }}"><span class="label label-default">{{ $tag->name  }}</span></a>
                        @endforeach
                    </h4>
                    <br />
                @endif
                {!! Form::open(array('url' => 'tag/store')) !!}
                <div class="form-group">
                    {!! Form::label('name','标签名:') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('确定',['class'=>'btn btn-success form-control']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
