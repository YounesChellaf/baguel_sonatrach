@extends('layout.main_layout')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            @include('supported.partials.pageTitle')
            @include('supported.partials.beadcrumbs')
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Nouvelle Prise en charge</h5>
                        </div>
                        <div class="card-block">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> Il y avait quelques problèmes lors la création du nouvelle resarvation annuel.
                                    <br>
                                    <ul class="t7wissa-errors-list">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @yield('content-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('extraJs')
@yield('js-form')
@endsection

