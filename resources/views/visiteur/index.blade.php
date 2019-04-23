@extends('layout.main_layout')
@include('layout.assets.datatable._css')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('visiteur.partials.pageTitle')
    @include('visiteur.partials.beadcrumbs')
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
                <button class="btn btn-round btn-outline-success" data-toggle="modal" data-target="#visitor-add-room">Ajouter un visiteur</button>
              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="basic-btn" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Numero carte identite</th>
                        <th>fonction</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(Visitor::all() as $visitor)
                      <tr>
                        <td>{{$visitor->last_name}}</td>
                        <td>{{$visitor->first_name}}</td>
                        <td>{{$visitor->identity_card_number}}</td>
                        <td>{{$visitor->function}}</td>
                        <td><button class="btn btn-round btn-outline-info" data-toggle="modal" data-target="#modal-update-{{$visitor->id}}">modifier</button></td>
                        <td><button class="btn btn-round btn-outline-danger" data-toggle="modal" data-target="#modal-delete-{{$visitor->id}}">Supprimer</button></td>
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
  <div id="visitor-add-room" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un visiteur</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="post" class="visitor-add" action="{{ route('visiteur.store') }}">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nom</label>
              <input type="text" class="form-control" id="recipient-name" name="last_name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Prenom</label>
              <input type="text" class="form-control" id="recipient-prenom" name="first_name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Numéro carte identité</label>
              <input type="text" class="form-control" id="recipient-carte" name="identity_card_number">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Fonction</label>
              <input type="text" class="form-control" id="recipient-carte" name="function">
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
@foreach(Visitor::all() as $visitor)
<div class="col-md-4">
  <div id="modal-update-{{$visitor->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modifier les information du visiteur</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="post" class="visito-add" action="{{ route('visiteur.update', $visitor->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nom</label>
              <input type="text" class="form-control" id="recipient-name" name="last_name" value="{{$visitor->last_name}}">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Prenom</label>
              <input type="text" class="form-control" id="recipient-prenom" name="first_name" value="{{$visitor->first_name}}">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Numéro carte identité</label>
              <input type="text" class="form-control" id="recipient-carte" name="identity_card_number" value="{{$visitor->identity_card_number}}">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Fonction</label>
              <input type="text" class="form-control" id="recipient-carte" name="function" value="{{$visitor->function}}">
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
<div class="modal fade" id="modal-delete-{{$visitor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alerte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez vous supprimer ce visiteur !
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ route('visiteur.destroy', $visitor->id) }}">
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
