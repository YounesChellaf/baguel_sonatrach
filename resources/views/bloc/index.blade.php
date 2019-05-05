@extends('layout.main_layout')
@include('layout.assets.datatable._css')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('bloc.partials.pageTitle')
    @include('bloc.partials.beadcrumbs')
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
                <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-bloc">Nouveau bloc</button>
              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="basic-btn" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Designation</th>
                        <th>number</th>
                        <th>type</th>
                        <th>Status</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(Bloc::all() as $bloc)
                      <tr>
                        <td>{{$bloc->name}}</td>
                        <td>{{$bloc->number}}</td>
                        <td>{{$bloc->type}}</td>
                        <td>{{$bloc->active}}</td>
                        <td><button class="btn btn-round btn-outline-info" data-toggle="modal" data-target="#modal-update-{{$bloc->id}}">modifier</button></td>
                        <td><button class="btn btn-round btn-outline-danger" data-toggle="modal" data-target="#modal-delete-{{$bloc->id}}">Supprimer</button></td>
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
  <div id="modal-add-bloc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un bloc</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="post" class="bloc-add" action="admin/bloc">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="control-label">designation du bloc</label>
              <input type="text" class="form-control" id="recipient-name" name="name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">number</label>
              <input type="text" class="form-control" id="recipient-number" name="number">
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <select name="type" class="form-control">
                  <option value="travail">Travail</option>
                  <option value="hebergement">hebergement</option>
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
@foreach(Bloc::all() as $bloc)
<div class="col-md-4">
  <div id="modal-update-{{$bloc->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modifier le bloc</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="post" class="bloc-add" action="admin/bloc/{{$bloc->id}}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="recipient-name" class="control-label">designation du bloc</label>
              <input type="text" class="form-control" id="recipient-name" name="name" value="{{$bloc->name}}">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">number</label>
              <input type="text" class="form-control" id="recipient-number" name="number" value="{{$bloc->number}}">
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <select name="type" class="form-control">
                  <option value="{{$bloc->type}}">{{$bloc->type}}</option>
                  <option value="travail">travail</option>
                  <option value="hebergement">hebergement</option>
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
<div class="modal fade" id="modal-delete-{{$bloc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alerte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez vous supprimer ce bloc !
      </div>
      <div class="modal-footer">
        <form method="POST" action="admin/bloc/{{$bloc->id}}">
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
@include('layout.assets.datatable._js')
@endsection
