
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
  @include('layout.assets._js')
</body>
</html>
