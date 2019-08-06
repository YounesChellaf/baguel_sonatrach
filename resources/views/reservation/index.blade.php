@extends('layout.main_layout')

@section('extraCss')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('reservation.partials.pageTitle')
    @include('reservation.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>Réservation</h5>
            <a href="#" class="ImportEmployeesAction">Importer</a>
            <a href="{{ route('admin.reservation.create') }}"><button type="button" style="float: right" class="btn btn-primary" name="button">Nouvelle réservation</button></a>
          </div>
          <div class="card-block">
            <div class="dt-responsive table-responsive">
              <table id="usersTable" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Chambre</th>
                    <th>Bloc</th>
                    <th>Employée</th>
                    <th>Date d'entrée</th>
                    <th>Date de sortie</th>
                    <th>Etat</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach(Reservation::where('cible','employee')->get() as $reservation)
                  <tr>
                    <td>{{$reservation->room->number}}</td>
                    <td>{{$reservation->room->bloc->name}} {{$reservation->room->bloc->number}}</td>
                    <td>{{$reservation->employee->last_name}} {{$reservation->employee->first_name}}</td>
                    <td>{{$reservation->date_in->format('Y-m-d')}}</td>
                    <td>{{$reservation->date_out->format('Y-m-d')}}</td>
                    <td>{{$reservation->status()}}</td>
                    <td>
                      <div class="dropdown-info dropdown open">
                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                          <a class="dropdown-item" data-toggle="modal" data-target="#modal-check-{{$reservation->id}}">Room checklist</a>
                          <a class="dropdown-item" href="{{ route('admin.reservation.approve', $reservation->id) }}">Valider</a>
                          <a class="dropdown-item"  href="{{ route('admin.reservation.reject', $reservation->id) }}">Rejeter</a>
                          <a class="dropdown-item" href="#">Modifier</a>
                          <a class="dropdown-item destroy" data-employee-id = "" data-employee-name = "" href="{{route('admin.reservation.delete', $reservation->id)}}">Supprimer</a>
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
      <h4 class="modal-title w-100" id="myModalLabel">Importation des employées</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>
        Cette option va vous permettre d'importer une liste des employées depuis un fichier Excel / CSV
      </p>
      <form action="{{ route('admin.employees.import') }}" class="employeesImportForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Fichier: </label>
          <div class="col-sm-10">
            <input type="file" name="EmployeesFileInput" required class="form-control">
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
@foreach(Reservation::all() as $reservation)
  <div class="col-md-4">
    <div id="modal-check-{{$reservation->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Décocher les equipements qui manque dans la chambre</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.reservation.create.checklist') }}" method="post">
              @csrf
              @foreach($reservation->room->instance as $instance)
                {{$i=0}}
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="container row" style="margin-left: 10%;margin-top: 1%">
                    <h5 for="inputState">{{$instance->equipement->type}}  </h5> <h4>  [  {{$instance->equipement->marque}}]</h4>
                    </div>
                    <input type="hidden" name="census[{{$instance->id}}][key]" id="" >
                    <input type="hidden" name="reservation_id" id="" value="{{$reservation->id}}">
                  </div>
                  {{--<div class="form-group col-md-4">--}}
                    {{--<input type="checkbox" name="census[value]" id="">--}}
                  {{--</div>--}}
                  <div class="form-group col-md-2">
                    <div class="checkbox">
                      <label style="font-size: 1.5em">
                        <input type="checkbox" name="census[{{$i}}][value]" >
                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                      </label>
                    </div>
                  </div>
                </div>
                {{$i++}}
              @endforeach
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach


@section('extraJs')
<script src="{{ asset('frontend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('frontend/assets/pages/data-table/js/data-table-custom.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
@endsection
