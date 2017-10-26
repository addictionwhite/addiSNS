@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">プロフィール編集</div>
                <div class="form-group">
                    {{ Form::open(['url'=>'profile/update', 'onsubmit' => 'return true;','files' => true]) }}
                        {{ Form::hidden('_method',  'PUT', []) }}

                        {{Form::label('', 'ニックネーム', [])}}
                        {{ Form::text('nickname', $profile->nickname, ['placeholder'=>'ニックネーム', 'class' => 'form-control']) }}
                        <span class="help-block">{{$errors->first('nickname')}}</span>

                        {{Form::label('content', 'プロフィール', [])}}
                        {{ Form::textarea('content', $profile->content ,['placeholder'=>'プロフィール内容','class'=>'form-control', 'rows'=>'3']) }}
                        <span class="help-block">{{$errors->first('content')}}</span>

                        {{Form::label('', 'サムネイル画像', [])}}<br>
                        <img id='thumbnailPreview' src='data:{{$profile->mime_type}};base64,{{$base64}}'>

                        {{ Form::file('thumbnail_image', ['id' => 'fileinput'])}}
                        <span class="help-block">{{$errors->first('thumbnail_image')}}</span>

                        {{ Form::button('戻る',['class'=>'btn homeBtn']) }}
                        {{ Form::submit('更新',['class'=>'btn']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/profileEdit.js') }}"></script>
@endsection
