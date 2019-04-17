@component('layout.partials.notifications.notification')
@slot('notifUrl')
{{ route('admin.notifications.handleClick', $notification->id) }}
@endslot
@slot('notifIcon')
<img src="{{ asset('frontend/assets/images/notifications/exit_permission.png') }}" alt="">
@endslot

@slot('notifUser')
{{ $notification->data->user->fullName }}
@endslot

@slot('notifBody')
a demandé un nouveau bon de sortie
@endslot

@slot('requestedAt')
{{ $notification->data->exitPermission->requestedAt }}
@endslot

@endcomponent
