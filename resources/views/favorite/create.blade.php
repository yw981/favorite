@extends('layouts.app')
@section('content')
<h1>title</h1>
<p>into</p>

    <h1>撰写新文章</h1>
    {!! Form::open() !!}
       <div class="form-group">
           {!! Form::label('title','标题:') !!}
           {!! Form::text('title',null,['class'=>'form-control']) !!}
       </div>
       <div class="form-group">
           {!! Form::label('url','正文:') !!}
           {!! Form::url('url',null,['class'=>'form-control']) !!}
       </div>
       <div class="form-group">
           {!! Form::submit('发表文章',['class'=>'btn btn-success form-control']) !!}
       </div>
    {!! Form::close() !!}

@endsection 