@extends('layout.main_layout')
@include('layout.assets.datatable._css')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('departement.partials.pageTitle')
    @include('departement.partials.beadcrumbs')
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
                <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-departement">Nouveau service</button>
              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="basic-btn" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Designation</th>
                        <th>Status</th>
                        <th>Direction</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(Service::all() as $departement)
                      <tr>
                        <td>{{$departement->name}}</td>
                        <td>{{$departement->active}}</td>
                        <td>{{$departement->direction->name}}</td>
                        <td><button class="btn btn-round btn-outline-info" data-toggle="modal" data-target="#modal-update-{{$departement->id}}">modifier</button></td>
                        <td><button class="btn btn-round btn-outline-danger" data-toggle="modal" data-target="#modal-delete-{{$departement->id}}">Supprimer</button></td>
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
<div class="col-md-4">
  <div id="modal-add-departement" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un departement</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="post" class="service-add" action="{{ route('services.store') }}">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="control-label">designation du departement</label>
              <input type="text" class="form-control" id="recipient-name" name="name">
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <select name="select" class="form-control">
                  <option value="">Choisir la direction</option>
                  @foreach(Division::all() as $direction)
                  <option value="{{$direction->id}}">{{$direction->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-round btn-outline-danger waves-effect" data-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-round btn-outline-success waves-effect waves-light">Ajouter</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@foreach(Service::all() as $departement)
<div class="col-md-4">
  <div id="modal-update-{{$departement->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modifier la direction</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('services.update', $departement->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="recipient-name" class="control-label">designation du departement</label>
              <input type="text" class="form-control" id="recipient-name" name="name" value="{{$departement->name}}">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Status</label>
              <input type="text" class="form-control" id="recipient-name" name="active" value="{{$departement->active}}">
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <select name="select" class="form-control">
                  <option value="{{$departement->direction->id}}">{{$departement->direction->name}}</option>
                  @foreach(Division::all() as $direction)
                  <option value="{{$direction->id}}">{{$direction->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-round btn-outline-danger waves-effect" data-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-round btn-outline-success waves-effect waves-light">Enregistrer</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-delete-{{$departement->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alerte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez vous supprimer ce departement !
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ route('services.destroy', $departement->id) }}">
          @csrf
          <input type="hidden">
          @method('delete')
          <button type="submit" class="btn btn-round btn-outline-danger">Confirmer</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection

@include('layout.assets.datatable._js')
