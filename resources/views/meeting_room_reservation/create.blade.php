@extends('layout.main_layout')
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
            <h5>Nouvelle réservation</h5>
          </div>
          <div class="card-block">
            @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong> Il y avait quelques problèmes lors la création du nouveau employée.
              <br>
              <ul class="t7wissa-errors-list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form action="{{ route('admin.meeting_room.create.post') }}" method="post">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputState">salle</label>
                  <select id="inputState" name="meeting_room_id" class="form-control">
                    <option selected>Choose...</option>
                    @foreach(MeetingRoom::where('reserved',false)->get() as $meeting_room)
                    <option value="{{$meeting_room->id}}">{{$meeting_room->designation}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Date de reservation</label>
                  <input type="date" name="date_reservation"  class="form-control" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPassword4">Du</label>
                  <input type="time" name="time_in" class="form-control" id="inputPassword4" placeholder="">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPassword4">Au</label>
                  <input type="time" name="time_out" class="form-control" id="inputPassword4" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail4">Remarques</label>
                <textarea type="text" name="remark" class="form-control" value="{{ old('phone') }}" id="inputEmail4" placeholder=""></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
@endsection
