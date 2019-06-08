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
    @include('office.partials.pageTitle')
    @include('office.partials.beadcrumbs')
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
                <a href="#" class="ImportEmployeesAction">Importer</a>
                <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-office">Nouveau bureau</button>
              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="usersTable" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Numero</th>
                        <th>Bloc</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(Office::all() as $office)
                      <tr>
                        <td>{{$office->number}}</td>
                        <td>{{$office->bloc->name}}</td>
                        <td>
                          <div class="dropdown-info dropdown open">
                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                              <a class="dropdown-item" data-toggle="modal" data-target="#modal-update-{{$office->id}}">Modifier</a>
                              <a class="dropdown-item" data-toggle="modal" data-target="#modal-delete-{{$office->id}}">Supprimer</a>
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
<div class="col-md-4">
  <div id="modal-add-office" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un bureau</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="post" class="office-add" action="{{ route('office.store') }}">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="control-label">Numero de bureau</label>
              <input type="text" class="form-control" id="recipient-name" name="number">
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <select name="bloc_id" class="form-control">
                  <option value="">Choisir un bloc</option>
                  @foreach(Bloc::all() as $bloc)
                  <option value="{{$bloc->id}}">{{$bloc->name}}</option>
                  @endforeach
                </select>
              </div>
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
@foreach(Office::all() as $office)
<div class="col-md-4">
  <div id="modal-update-{{$office->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modifier le bureau</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="post" class="office-add" action="{{ route('office.update', $office->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="recipient-name" class="control-label">Numero du bureau</label>
              <input type="text" class="form-control" id="recipient-name" name="number" value="{{$office->number}}">
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <select name="bloc_id" class="form-control">
                  <option value="{{$office->bloc->id}}">{{$office->bloc->name}}</option>
                  @foreach(Bloc::all() as $bloc)
                  <option value="{{$bloc->id}}">{{$bloc->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Status</label>
              <input type="text" class="form-control" id="recipient-name" name="active" value="{{$office->active}}">
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
<div class="modal fade" id="modal-delete-{{$office->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alerte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez vous supprimer ce bureau !
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ route('office.destroy', $office->id) }}">
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
<div class="modal fade right" id="ImportEmployeesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
  <div class="modal-dialog modal-full-height modal-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Importation des bureaux</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Cette option va vous permettre d'importer une liste des bureaux depuis un fichier Excel / CSV
        </p>
        <form action="{{ route('admin.office.import') }}" class="employeesImportForm" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Fichier: </label>
            <div class="col-sm-10">
              <input type="file" name="OfficesFileInput" required class="form-control">
            </div>
          </div>
          <button type="submit" class="btn btn-info">Importer</button>
        </form>
        </ul>
      </div>
    </div>
  </div>
</div>
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
