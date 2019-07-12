@extends('layout.main_layout')
@include('layout.assets.datatable._css')
@section('extraCss')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('meeting_room.partials.pageTitle')
    @include('meeting_room.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">

      <div class="page-body">
        <div class="row">
          <div class="col-sm-12">

            <div class="card">
              <div class="card-header table-card-header">
                <h5>HTML5 Export Buttons</h5>
                <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-meeting-room">Nouvelle salle</button>
              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="usersTable" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Designation de la salle</th>
                        <th>Emplacement</th>
                        <th>Capacité</th>
                        <th>Etat</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(MeetingRoom::all() as $meeting_room)
                      <tr>
                        <td>{{$meeting_room->designation}}</td>
                        <td>{{$meeting_room->location}}</td>
                        <td>{{$meeting_room->total_capacity}}</td>
                        <td>{{$meeting_room->reserved()}}</td>
                        <td>
                          <div class="dropdown-info dropdown open">
                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                              <a class="dropdown-item" data-toggle="modal" data-target="#modal-update-{{$meeting_room->id}}">Modifier</a>
                              <a class="dropdown-item" data-toggle="modal" data-target="#modal-delete-{{$meeting_room->id}}">Supprimer</a>
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
  </div>
</div>
<div id="styleSelector">
</div>
<div class="col-md-4 col-sm-12">
  <div id="modal-add-meeting-room" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ajouter une salle</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form class="meeting-room-add" method="post" class="room-add" action="{{route('meeting_room.store')}}">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="control-label">Designation du salle</label>
              <input type="text" class="form-control" id="recipient-name" name="designation">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Emplacement</label>
              <input type="text" class="form-control" id="recipient-location" name="location">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Capacité totale (personne)</label>
              <input type="text" class="form-control" id="recipient-capacity" name="total_capacity">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@foreach(MeetingRoom::all() as $meeting_room)
<div class="col-md-4">
  <div id="modal-update-{{$meeting_room->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modifier la salle</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="post" class="room-add" action="{{ route('meeting_room.update', $meeting_room->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="recipient-name" class="control-label">Designation de la salle</label>
              <input type="text" class="form-control" id="recipient-name" name="designation" value="{{$meeting_room->designation}}">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Emplacement</label>
              <input type="text" class="form-control" id="recipient-name" name="location" value="{{$meeting_room->location}}">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">capacité totale (personne)</label>
              <input type="text" class="form-control" id="recipient-name" name="total_capacity" value="{{$meeting_room->total_capacity}}">
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
<div class="modal fade" id="modal-delete-{{$meeting_room->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alerte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez vous supprimer cette salle du systeme !
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{route('meeting_room.destroy',$meeting_room->id)}}">
          @csrf
          <input type="hidden">
          @method('delete')
          <button type="submit" class="btn btn-danger">Confirmer</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@include('layout.assets.datatable._js')
@endsection
@section('extraJs')
  <script src="{{ asset('frontend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('frontend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/pages/data-table/js/data-table-custom.js') }}"></script>
  <script src="{{ asset('frontend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('frontend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
@endsection
