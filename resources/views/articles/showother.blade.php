@extends('layouts.default')

@section('content')
    <div id="article_titles">
        <h1>其他相关文章</h1>
        @foreach($other as $val)
        <article><a href="{{ route('showOtherArticle',$val->id) }}">{{ $val->title }}</a></article>
        @endforeach
    </div>
@stop