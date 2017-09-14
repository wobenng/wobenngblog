@extends('layouts.default')

@section('content')
    <div id="article_titles">
        <h1>CSS相关文章</h1>
        @foreach($css as $val)
        <article><a href="{{ route('showCssArticle',$val->id) }}">{{ $val->title }}</a></article>
        @endforeach
    </div>
@stop