@foreach (['danger', 'warning', 'success', 'info'] as $msg)
  @if(session()->has($msg))
    <div>
      <p id="alert_msg">
        {{ session()->get($msg) }}
      </p>
    </div>
  @endif
@endforeach