
@extends('layouts.default')
@section('content')
@include('shared._message')
<div class=" col-md-8 usersform" >
  <div class="panel panel-default" id='panel-default'>
    <div class="panel-heading" id="panel-heading">
      <h5>登录</h5>
    </div>
    <div class="panel-body">
    @include('shared._errors')
      <form  method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}

          <div class="form-group">
            <label for="email">邮箱：</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label for="password">密码：</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
          </div>

          <div class="checkbox">
            <label><input type="checkbox" name="remember"> 记住我</label>
          </div>

          <button type="submit" class="btn btn-primary" >登录</button>
      </form>
    </div>
  </div>
</div>
@stop