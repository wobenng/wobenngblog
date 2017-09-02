<a href="{{ route('users.show', $user->id) }}">
  <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar"/>
</a>
<h1 id="welcomeUser">{{ $user->name }}，欢迎来到wobenng的博客</h1>