@extends('layout.main_layout')

@section('extraCss')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('users.partials.pageTitle')
    @include('users.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>Comptes utilisateurs</h5>
            <a href="{{ route('admin.users.create') }}"><button type="button" style="float: right" class="btn btn-primary" name="button">Nouveau compte</button></a>
          </div>
          <div class="card-block">
            <div class="dt-responsive table-responsive">
              <table id="usersTable" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Nom complet</th>
                    <th>Département</th>
                    <th>Type de compte</th>
                    <th>Poste</th>
                    <th>Date de dernière connexion</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(User::all() as $index => $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>
                      <div class="dropdown-info dropdown open">
                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                          <a class="dropdown-item" href="#!">Consulter</a>
                          <a class="dropdown-item" href="#!">Modifier</a>
                          <a class="dropdown-item" href="#!">Supprimer</a>
                          <a class="dropdown-item" href="#!">Bloquer</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('extraJs')
<script src="{{ asset('frontend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('frontend/assets/pages/data-table/js/data-table-custom.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
@endsection
