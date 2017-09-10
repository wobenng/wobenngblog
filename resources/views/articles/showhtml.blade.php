@extends('layouts.default')

@section('content')
    <div id="article_titles">
        <h1>HTML相关文章</h1>
        @foreach($html as $val)
        <article><a href="{{ route('showHtmlArticle',$val->id) }}">{{ $val->title }}</a></article>
        @endforeach
    </div>
@stop