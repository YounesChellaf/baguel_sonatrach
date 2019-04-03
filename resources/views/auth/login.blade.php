<!DOCTYPE html>
<html lang="en">
<head>
  <title>EASY BUSINESS SUITE :: AZIMUT BUSINESS SOLUTIONS</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/animate/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/css-hamburgers/hamburgers.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/select2/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/css/main.css') }}">

</head>
<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="{{ asset('frontend/assets/images/easybusinesssuitelogo.png') }}" alt="">
          <hr>
          <img id="SonatrachLogo" src="{{ asset('frontend/assets/images/sonatrach_logo.gif') }}" alt="">
        </div>
        <form class="login100-form validate-form" method="POST" action="{{ route('auth.login.view') }}">
          @csrf
          <span class="login100-form-title">
            Connexion
          </span>
          <div class="wrap-input100 validate-input" data-validate = "Le compte d'utilisateur est obligatoire">
            <input class="input100" type="text" name="username" placeholder="Nom d'utilisateur">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Le mot de passe est obligatoire">
            <input class="input100" type="password" name="password" placeholder="Mot de passe">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Go
            </button>
          </div>
          <div class="text-center p-t-12">
            <span class="txt1">
              J'ai oublié
            </span>
            <a class="txt2" href="#">
              Mon mot de passe
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="{{ asset('frontend/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('frontend/login/vendor/bootstrap/js/popper.js') }}"></script>
  <script src="{{ asset('frontend/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/login/vendor/select2/select2.min.js') }}"></script>
  <script src="{{ asset('frontend/login/vendor/tilt/tilt.jquery.min.js') }}"></script>
  <script >
  $('.js-tilt').tilt({
    scale: 1.1
  })
  </script>
  <script src="{{ asset('frontend/login/js/main.js') }}"></script>
</body>
</html>
