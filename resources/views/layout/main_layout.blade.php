
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
@include('layout.components.head')
<body>

  <div class="loader-bg">
    <div class="loader-bar"></div>
  </div>
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      @include('layout.components.headNav')
      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          @include('layout.components.mainNav')
          <div class="pcoded-content">
            @yield('content')
          </div>
          <div id="styleSelector">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="loading">
    <img src="{{ url('frontend/assets/images/loading.gif') }}"/>
  </div>
  <!-- Full Height Modal Right -->
  <div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-full-height modal-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Changer la source des données</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Cette option va vous permettre de personnaliser le contenu de l'application selon le choix de base de vie/administration que vous choisissez
        </p>
        <h5>Bases de vie</h5><br>
        <ul class="list-group z-depth-0">
          @foreach(LifeBase::all() as $index => $lifebase)
          <li class="list-group-item justify-content-between switchDataSource" data-type = 'lifebase' data-lifebase = "{{ $lifebase->name }}" data-lbid= '{{ $lifebase->id }}'>
            {{ $lifebase->name }}
          </li>
          @endforeach
        </ul><br>
        <h5>Administrations</h5><br>
        <ul class="list-group z-depth-0">
          @foreach(Administration::all() as $index => $administration)
          <li class="list-group-item justify-content-between switchDataSource" data-type = 'administration' data-admin = "{{ $administration->name }}" data-adminid= '{{ $administration->id }}'>
            {{ $administration->name }}
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Full Height Modal Right -->
<div class="md-overlay"></div>
@include('layout.assets._js')
@yield('extraJs')
</body>
</html>
