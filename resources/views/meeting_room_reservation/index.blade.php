@extends('layout.main_layout')

@section('extraCss')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('meeting_room_reservation.partials.pageTitle')
    @include('meeting_room_reservation.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>Réservation</h5>
            <a href="{{ route('admin.meeting_reservation.create') }}"><button type="button" style="float: right" class="btn btn-primary" name="button">Nouvelle réservation</button></a>
          </div>
          <div class="card-block">
            <div class="dt-responsive table-responsive">
              <table id="usersTable" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Salle</th>
                    <th>Reserveur</th>
                    <th>Date prévu </th>
                    <th>debut d'occupation</th>
                    <th>fin d'occupation</th>
                    <th>Etat</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach(MeetingReservation::all() as $reservation)
                  <tr>
                    <td>{{$reservation->meeting_room->designation}}</td>
                    <td>{{auth()->user($reservation->reserver_id)->firstName}} {{auth()->user($reservation->reserver_id)->lastName}}</td>
                    <td>{{$reservation->date_reservation}}</td>
                    <td>{{$reservation->time_in}}</td>
                    <td>{{$reservation->time_out}}</td>
                    <td>{{$reservation->status()}}</td>
                    <td>
                      <div class="dropdown-info dropdown open">
                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                          <a class="dropdown-item" href="#!">Consulter</a>
                          <a class="dropdown-item" href="{{ route('admin.meeting_reservation.approve', $reservation->id) }}">Valider</a>
                          <a class="dropdown-item"  href="{{ route('admin.meeting_reservation.reject', $reservation->id) }}">Rejeter</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#modal-update-{{$reservation->id}}">Modifier</a>
                          <a class="dropdown-item destroy" data-employee-id = "" data-employee-name = "" href="{{route('admin.meeting_reservation.delete', $reservation->id)}}">Supprimer</a>
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
@foreach(MeetingReservation::all() as $meeting_reservation)
  <div class="col-md-4">
    <div id="modal-update-{{$meeting_reservation->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modifier la reservation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <form method="post" class="room-add" action="{{route('admin.meeting_reservation.update',$meeting_reservation->id)}}">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputState">salle</label>
                  <select id="inputState" name="meeting_room_id" class="form-control">
                    <option selected value="{{$meeting_reservation->meeting_room_id}}">{{$meeting_reservation->meeting_room->designation}}</option>
                    @foreach(MeetingRoom::where('reserved',false)->get() as $meeting_room)
                      <option value="{{$meeting_room->id}}">{{$meeting_room->designation}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Date de reservation</label>
                  <input type="date" name="date_reservation"  class="form-control" id="inputEmail4" value="{{$meeting_reservation->date_reservation}}">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPassword4">Du</label>
                  <input type="time" name="time_in" class="form-control" id="inputPassword4" value="{{$meeting_reservation->time_in}}">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPassword4">Au</label>
                  <input type="time" name="time_out" class="form-control" id="inputPassword4" value="{{$meeting_reservation->time_out}}">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail4">Remarques</label>
                <textarea type="text" name="remark" class="form-control" value="{{$meeting_reservation->remark}}" id="inputEmail4" placeholder=""></textarea>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Enregistrer</button>
              </div>
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
