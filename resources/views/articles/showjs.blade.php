@extends('layouts.default')

@section('content')
    <div id="article_titles">
        <h1>JavaScript相关文章</h1>
        @foreach($js as $val)
        <article><a href="{{ route('showJsArticle',$val->id) }}">{{ $val->title }}</a></article>
        @endforeach
    </div>
@stop