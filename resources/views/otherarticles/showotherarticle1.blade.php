@extends('layouts.default')

@section('content')
    <div id="article_comment">
        <div id="article_content">hao</div>
        <div id="show_comments">
            @if(!empty($allcomments))
            @foreach($allcomments as $val)
            <img src="{{$val->user->gravatar('40')}}" alt="{{$val->user->name}}" class="gravatar"/>
            <div id="userAndtime">
                <div>{{$val->user->name}}</div>
                <div>{{ $val->created_at->diffForHumans() }}</div>
            </div>
            <article>{{ $val->content }}</article>
            @endforeach
            @endif
        </div>
        @if(Auth::check())
        <div id="comment">
            <form method="POST" action="{{route('comments.store_other', $article->id)}}">
                @include('shared._errors')
                {{ csrf_field() }}
                <textarea  rows="4" placeholder="说说你的想法..." name="content">{{ old('content') }}</textarea>
                <button type="submit" class="btn btn-primary pull-right">发布</button>
            </form>
        </div>
        @endif
    </div>
@stop