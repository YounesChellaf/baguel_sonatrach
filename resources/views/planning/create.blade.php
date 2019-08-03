@extends('layout.main_layout')
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
            <h5>Nouvelle réservation</h5>
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
            <form action="{{ route('admin.planning.create.post') }}" method="post">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputState">Chambre</label>
                  <select id="inputState" name="room_id" class="form-control">
                    <option value="" selected>Choose...</option>
                    @foreach(Room::all() as $room)
                    <option value="{{$room->id}}">{{$room->number}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputState">Employee 1</label>
                  <select id="inputState" name="employee_id1" class="form-control">
                    <option value="" selected>Choose...</option>
                    @foreach(Employee::all() as $employee)
                      <option value="{{$employee->id}}">{{$employee->last_name}} {{$employee->first_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputState">Employee 2</label>
                  <select id="inputState" name="employee_id2" class="form-control">
                    <option value="" selected>Choose...</option>
                    @foreach(Employee::all() as $employee)
                      <option value="{{$employee->id}}">{{$employee->last_name}} {{$employee->first_name}}</option>
                    @endforeach
                  </select>
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
