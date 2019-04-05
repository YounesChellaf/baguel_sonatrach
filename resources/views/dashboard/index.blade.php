@extends('layout.main_layout')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('dashboard.partials.pageTitle')
    @include('dashboard.partials.beadcrumbs')
  </div>
</div>
  @yield('main-content')
@endsection
