<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ABI - login</title>
    <link rel="stylesheet" href="/styles/login.css " />
  </head>

  <body>
    <div class="loginfunction">
    <!-- @if (session('success'))
        <p style="color: green; text-align:center">{{ session('success') }}</p>
        @endif
        @if (session('error'))
        <p style="color: red; text-align:center">{{ session('error') }}</p>
        @endif -->
        <h2>
            <a href="{{route('index')}}"><img src="/img/logo.webp" alt=""></a>
          </h2>
      <div class="login">
        @include('layouts._message')
        <h2>login to get access</h2>
        <form action="{{route('loginsubmit')}}" method="POST" >
        @csrf
          <div class="form-con">
            <label for="">Email</label>
            <input type="text" name="email" required/>
          </div>
          <div class="form-con">
            <label for="">password</label>
            <input type="password" name="password" required/>
          </div>
          <div class="form-con">
            <input type="submit" name="login" value="login"  class="submitbutton"/>
          </div>
        </form>
        <p>Didn't have account? <span><a href="{{route('register')}}">register</a></span></p>
      </div>
    </div>
  </body>
</html>
