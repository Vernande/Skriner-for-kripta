<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Autorisation</title>
    <link rel="stylesheet" href="{{url('css\auth.css')}}" />
  </head>
  <body>
    <a href="#" class="open-popup">Войти</a>
    <!-- Autorisation -->
    <section id="login">
      <div class="popup-bg">
        <div class="popup">
          <div class="login-box">
            <img class="close-popup" src="{{url('img\close-outline.png')}}" alt="" />
            <h2>Login</h2>
            <form action="/login" method="post">
              @csrf
              <div class="user-box">
                <input name="login" type="text" />
                <label>Username</label>
              </div>
              <div class="user-box">
                <input name = "password" type="password" />
                <label>Password</label>
              </div>
              <a>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Войти
              </a>
              <input type="submit" value="Войти">
              <a onclick="switchForm()">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Зарегистрироваться
              </a>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section id="register" style="display: none">
      <div class="popup-bg">
        <div class="popup">
          <div class="login-box">
            <img class="close-popup" src="{{url('img\close-outline.png')}}" alt="" />
            <h2>Registration</h2>
            <form action="registration" method="post">
              @csrf
              <div class="user-box">
                <input name = 'login' type="text" />
                <label>Username</label>
              </div>
              <div class="user-box">
                <input name = 'password' type="password" />
                <label>Password</label>
              </div>
              <div class="user-box">
                <input name="email" type="email" />
                <label>Email</label>
              </div>
              <a onclick="switchForm()">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Регистрация
              </a>
              <input type="submit" value="Зарегистрироваться">
            </form>
          </div>
        </div>
      </div>
    </section>
    >
    <script src="{{url('js\jquery.min.js')}}"></script>
    <script src="{{url('js\main.js')}}"></script>
  </body>
</html>