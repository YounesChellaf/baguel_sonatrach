<!DOCTYPE html>
<html lang="en">

<head>
  <title>Gestion base de vie :: Baguel</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
  <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
  <meta name="author" content="colorlib" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all"> <link rel="stylesheet" type="text/css" href="../files/assets/icon/feather/css/feather.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/icon/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/icon/icofont/css/icofont.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/pages.css') }}">
</head>
<body themebg-pattern="theme1">
  <div class="theme-loader">
    <div class="loader-track">
      <div class="preloader-wrapper">
        <div class="spinner-layer spinner-blue">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-yellow">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-green">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="login-block">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <form class="md-float-material form-material" method="post" action="{{ route('auth.setPassword.post') }}">
            @csrf
            <div class="text-center">
              @if ($errors->any())
              <div class="alert alert-danger">
                <strong>Whoops!</strong> Il y avait quelques problèmes lors la création du nouveau compte.
                <br>
                <ul class="t7wissa-errors-list">
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <img width="250" src="{{ asset('frontend/assets/images/easybusinesssuitelogo.png') }}" alt="logo.png">
            </div>
            <div class="auth-box card">
              <div class="card-block">
                <div class="row m-b-20">
                  <div class="col-md-12">
                    <h3 class="text-left">Définir un nouveau mot de passe</h3>
                  </div>
                </div>
                <div class="form-group form-primary">
                  <input type="password" name="password" class="form-control" required="">
                  <span class="form-bar"></span>
                  <label class="float-label">Mot de passe</label>
                </div>
                <div class="form-group form-primary">
                  <input type="password" name="password_confirmation" class="form-control" required="">
                  <span class="form-bar"></span>
                  <label class="float-label">Confirmation de mot de passe</label>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Procéder</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


  <script type="text/javascript" src="{{ asset('frontend/bower_components/jquery/js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/bower_components/popper.js/js/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/pages/waves/js/waves.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/bower_components/modernizr/js/modernizr.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/bower_components/modernizr/js/css-scrollbars.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/assets/js/common-pages.js') }}"></script>
</body>

</html>
