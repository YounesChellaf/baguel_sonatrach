<ul class="nav-right">
  <li class="header-notification">
    <div class="dropdown-primary dropdown">
      <div class="dropdown-toggle" data-toggle="dropdown">
        <i class="feather icon-bell"></i>
        <span class="badge bg-c-red">5</span>
      </div>
      <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
        <li>
          <h6>Notifications</h6>
          <label class="label label-danger">New</label>
        </li>
        <li>
          <div class="media">
            <img class="img-radius" src="{{ asset('frontend/assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
            <div class="media-body">
              <h5 class="notification-user">John Doe</h5>
              <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
              <span class="notification-time">30 minutes ago</span>
            </div>
          </div>
        </li>
        <li>
          <div class="media">
            <img class="img-radius" src="{{ asset('frontend/assets/images/avatar-3.jpg') }}" alt="Generic placeholder image">
            <div class="media-body">
              <h5 class="notification-user">Joseph William</h5>
              <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
              <span class="notification-time">30 minutes ago</span>
            </div>
          </div>
        </li>
        <li>
          <div class="media">
            <img class="img-radius" src="{{ asset('frontend/assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
            <div class="media-body">
              <h5 class="notification-user">Sara Soudein</h5>
              <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
              <span class="notification-time">30 minutes ago</span>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </li>
  <li class="header-notification">
    <div class="dropdown-primary dropdown">
      <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
        <i class="feather icon-message-square"></i>
        <span class="badge bg-c-green">3</span>
      </div>
    </div>
  </li>
  <li class="user-profile header-notification">
    <div class="dropdown-primary dropdown">
      <div class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ asset('frontend/assets/images/avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image">
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
