<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>
    <div class="background">
      <div class="shape"></div>
      <div class="shape"></div>
    </div>
    <form method="POST" action="{{route('login')}}" enctype="multipart/form-data">
			{{csrf_field()}}
      <h3 style="margin-bottom: 12px;">Login Here</h3>
      @if($errors->any())
          @foreach($errors->all() as $error)
            <div style="color: #ff2c1d;">{{$error}}</div>
          @endforeach
      @endif
      @if(session('fail'))
            <div style="color: #ff2c1d;">{{session('fail')}}</div>
      @endif
      <label for="username">Email</label>
      <input name="email" type="text" placeholder="Email" id="username" value="{{old('email')}}" />
      <label for="password">Password</label>
      <input name="password" type="password" placeholder="Password" id="password" />
      <button>Log in</button>
    </form>
  </body>
</html>
