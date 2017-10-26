@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{Form::label('', 'ニックネーム', [])}}<br>
                    <img id='thumbnailPreview' src='data:{{$profile->mime_type}};base64,{{$base64}}'><br>
                    {{$profile->nickname }}<br>


                   {{Html::linkAction('ProfileController@edit','プロフィール編集')}} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
