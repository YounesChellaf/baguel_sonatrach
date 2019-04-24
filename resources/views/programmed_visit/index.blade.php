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
            <div class="dt-responsive table-responsive">
              <table id="usersTable" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Réference</th>
                    <th>nom de societe</th>
                    <th>date entrée</th>
                    <th>Nombre de visiteurs</th>
                    <th>Crée par</th>
                    <th>Etat</th>
                    <th>Action</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(Visit::all() as $visit)
                  <tr>
                    <td><span data-toggle="modal" data-target="#modal-visit-{{$visit->id}}">{{ $visit->company_name }}</span></td>
                    <td>{{ $visit->company_name }}</td>
                    <td>{{ $visit->in_date }}</td>
                    <td> {{$visit->visitor->count()}}</td>
                    <td>{{ $visit->CreatedBy->firstName }} {{$visit->CreatedBy->lastName}}</td>
                    <td>{{$visit->status()}}</td>
                    <td>
                      <div class="dropdown-info dropdown open">
                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                          <a class="dropdown-item" href="/admin/visit/validate/{{$visit->id}}">Valider</a>
                          <a class="dropdown-item removeSupplier" data-supplier-id="" data-supplier-name="" href="/admin/visit/reject/{{$visit->id}}">Rejeter</a>
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
@foreach(Visit::all() as $visit)
<div class="modal fade" id="modal-visit-{{$visit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details du visit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container" style="margin: 5%">
        <div class=" row">
        <h6>Réference du visite :</h6>
        <p>{{$visit->company_name}}</p>
        </div>
        <div class=" row">
          <h6>Nom de la societé :</h6>
          <p>{{$visit->company_name}}</p>
        </div>
        <div class=" row">
          <h6>Employée concernée:</h6>
          <p>{{$visit->employee->first()->last_name}} {{$visit->employee->first()->first_name}}</p>
        </div>
        <div class=" row">
          <h6>Date sortie :</h6>
          <p>{{$visit->out_date}}</p>
        </div>
        <div class=" row">
          <h6>Date sortie :</h6>
          <p>{{$visit->out_date}}</p>
        </div>
        <div class=" row">
          <h6>Date sortie :</h6>
          <p>{{$visit->out_date}}</p>
        </div>
        <div class=" row">
          <h6>Date sortie :</h6>
          <p>{{$visit->out_date}}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection

@section('extraJs')
<script src="{{ asset('frontend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('frontend/assets/pages/data-table/js/data-table-custom.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
@endsection
