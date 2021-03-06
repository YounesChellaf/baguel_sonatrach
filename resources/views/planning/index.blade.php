@extends('layout.main_layout')

@section('extraCss')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('planning.partials.pageTitle')
    @include('planning.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>Planning</h5>
            <a href="#" class="ImportEmployeesAction">Importer</a>
            <a href="{{ route('admin.planning.create') }}"><button type="button" style="float: right" class="btn btn-primary" name="button">Nouvelle réservation annuel</button></a>
          </div>
          <div class="card-block">
            <div class="dt-responsive table-responsive">
              <table id="usersTable" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Chambre</th>
                    <th>Bloc</th>
                    <th>Employée 1</th>
                    <th>Employée 2</th>
                    <th>Etat</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach(Planning::all() as $planning)
                  <tr>
                    <td>{{$planning->room->number}}</td>
                    <td>{{$planning->room->bloc->name}} {{$planning->room->bloc->number}}</td>
                    <td>{{$planning->employee($planning->employee_id1)->last_name}} {{$planning->employee($planning->employee_id1)->first_name}}</td>
                    <td>{{$planning->employee($planning->employee_id2)->last_name}} {{$planning->employee($planning->employee_id2)->first_name}}</td>
                    <td>{{$planning->status()}}</td>
                    <td>
                      <div class="dropdown-info dropdown open">
                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                          <a class="dropdown-item" href="#!">Consulter</a>
                          <a class="dropdown-item" href="{{ route('admin.planning.approve', $planning->id) }}">Valider</a>
                          <a class="dropdown-item"  href="{{ route('admin.planning.reject', $planning->id) }}">Rejeter</a>
                          <a class="dropdown-item" href="{{ route('admin.planning.update',$planning->id)}}">Modifier</a>
                          <a class="dropdown-item destroy" data-employee-id = "" data-employee-name = "" href="{{route('admin.reservation.delete', $planning->id)}}">Supprimer</a>
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


<div class="modal fade right" id="ImportEmployeesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-full-height modal-right" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title w-100" id="myModalLabel">Importation du planning annuel</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>
        Cette option va vous permettre d'importer le planning de reservation des chambres depuis un fichier Excel / CSV
      </p>
      <form action="{{ route('admin.planning.import') }}" class="employeesImportForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Fichier: </label>
          <div class="col-sm-10">
            <input type="file" name="PlanningFileInput" required class="form-control">
          </div>
        </div>
        <button type="submit" class="btn btn-info">Importer</button>
      </form>
    </ul>
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
