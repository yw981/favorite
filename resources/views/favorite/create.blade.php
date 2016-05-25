@extends('layouts.app')
@section('css')
    <link rel='stylesheet' href="/css/select2.min.css" type='text/css' media='all'/>
@endsection
@section('content')
    <div class="container">
          <div class="row">
            <div class="col-md-9" role="main">
                <h1>添加收藏</h1>
                {!! Form::open() !!}
                <div class="form-group">
                    {!! Form::label('title','标题:') !!}
                    <label>{!! Form::checkbox('autoTitle', '1', true) !!}自动获取网页标题</label>
                    {!! Form::text('title',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tag_list','选择标签') !!}
                    <a href="{{ url('/tag/create') }}">
                        <button type="button" class="btn btn-info pull-right">
                            + 添加标签
                        </button>
                    </a>
                </div>
                {!! Form::select('tag_list[]',$tags,null,['class'=>'form-control js-example-basic-multiple','multiple'=>'multiple']) !!}

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

@section('script')
    <script>
        $(function() {
            $(".js-example-basic-multiple").select2({
                placeholder: "添加标签"
            });
        });
    </script>
    <script src="/js/select2.min.js"></script>
@endsection