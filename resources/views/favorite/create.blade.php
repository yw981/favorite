@extends('layouts.app')
@section('content')
    <div class="container">
          <div class="row">
            <div class="col-md-9" role="main">
                <h1>添加收藏</h1>
                {!! Form::open() !!}
                <div class="form-group">
                    {!! Form::label('title','标题:') !!}
                    <label>{!! Form::checkbox('autoTitle', '1', true) !!}show</label>

                    {!! Form::text('title',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('url','URL:') !!}
                    {!! Form::url('url',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('确定',['class'=>'btn btn-success form-control']) !!}
                </div>
                {!! Form::close() !!}
            </div>
          </div>
    </div>


@endsection