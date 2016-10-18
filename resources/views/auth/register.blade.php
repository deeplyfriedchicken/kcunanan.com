<html>
<head>
  <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
</head>
<body>
<div class="login-page">
  <div class="form">
<form class="register-form" role="form" method="POST" action="{{ url('/register') }}">
      {{ csrf_field() }}
      <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="first name" required autofocus>

      @if ($errors->has('first_name'))
          <span class="help-block">
              <strong>{{ $errors->first('first_name') }}</strong>
          </span>
      @endif

      <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="last name" required>
      @if ($errors->has('last_name'))
          <span class="help-block">
              <strong>{{ $errors->first('last_name') }}</strong>
          </span>
      @endif

      <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="username" required>
      @if ($errors->has('username'))
          <span class="help-block">
              <strong>{{ $errors->first('username') }}</strong>
          </span>
      @endif

      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required>
      @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif

      <input id="password" type="password" class="form-control" name="password" placeholder="password" required>
      @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

      @if ($errors->has('password_confirmation'))
          <span class="help-block">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
      @endif

    <button type="submit">create</button>
    <p class="message">Already registered? <a href="{{ url('/login') }}">Sign In</a></p>
  </div>
</form>
</div>
</body>
</html>
