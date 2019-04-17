@extends('layout.main_layout')

@section('extraCss')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('programmed_visit.partials.pageTitle')
    @include('programmed_visit.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>Fournisseurs</h5>
            <a href="/admin/visit/create"><button type="button" style="float: right" class="btn btn-primary" name="button">Nouveau Fournisseur</button></a>
          </div>
          <div class="card-block">
            <div class="col-sm-10 dt-responsive table-responsive">
              <table id="usersTable" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>nom de societe</th>
                    <th>date entrée</th>
                    <th>date sortie</th>
                    <th>Employee á destination</th>
                    <th>Nombre de visiteurs</th>
                    <th>Crée par</th>
                    <th>Etat</th>
                    <th>Etat</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(Visit::all() as $visit)
                  <tr>
                    <td>{{ $visit->company_name }}</td>
                    <td>{{ $visit->in_date }}</td>
                    <td>{{ $visit->out_date }}</td>
                    <td>{{ $visit->concerned_id}}</td>
                    <td> </td>
                    <td>{{ $visit->CreatedBy->firstName }} {{$visit->CreatedBy->lastName}}</td>
                    <td>{{$visit->status()}}</td>
                    <td>
                      <div class="dropdown-info dropdown open">
                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                          <a class="dropdown-item" href="">Consulter</a>
                          <a class="dropdown-item" href="">Modifier</a>
                          <a class="dropdown-item removeSupplier" data-supplier-id="" data-supplier-name="" href="">Supprimer</a>
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
