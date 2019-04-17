<ul class="nav-right">
  <li class="header-notification">
    <div class="dropdown-primary dropdown">
      <div class="dropdown-toggle" data-toggle="dropdown">
        <i class="feather icon-bell"></i>
        <span class="badge bg-c-red">{{ Auth::user()->unreadNotifications->count() }}</span>
      </div>
      <ul class="show-notification notification-view dropdown-menu" style="height: 400px;overflow-x:scroll;" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
        <li>
          <h6>Notifications</h6>
          <label class="label label-danger">New</label>
        </li>
        @foreach(Auth::user()->unreadNotifications as $index => $notification)
            @include('layout.partials.notifications.types.'. snake_case($notification->type), [
            'notification' => $notification])
        @endforeach
      </ul>
    </div>
  </li>
  <li class="user-profile header-notification">
    <div class="dropdown-primary dropdown">
      <div class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ asset('frontend/assets/images/boss.png') }}" class="img-radius" alt="User-Profile-Image">
        <span>{{ Auth::user()->name() }}</span>
        <i class="feather icon-chevron-down"></i>
      </div>
      <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
        <li>
          <a href="#!">
            <i class="feather icon-settings"></i> Paramètres
          </a>
        </li>
        <li>
          <a href="#!">
            <i class="feather icon-mail"></i> Mes Notifications
          </a>
        </li>
        <li>
          <a href="#!">
            <i class="feather icon-lock"></i> Verrouiller l'écran
          </a>
        </li>
        <li>
          <a href="{{ route('auth.logout') }}">
            <i class="feather icon-log-out"></i> Déconnecter
          </a>
        </li>
      </ul>
    </div>
  </li>
</ul>
