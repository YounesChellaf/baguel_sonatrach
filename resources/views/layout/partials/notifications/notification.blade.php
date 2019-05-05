<a href="{{ $notifUrl }}">
  <li>
    <div class="media">
      {{ $notifIcon }}
      <div class="media-body">
        <h5 class="notification-user">{{ $notifUser }}</h5>
        <p class="notification-msg">{{ $notifBody }}</p>
        <span class="notification-time">{{ $requestedAt }}</span>
      </div>
    </div>
  </li>
</a>
