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
            @include('equipement.partials.pageTitle')
            @include('equipement.partials.beadcrumbs')
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
                                    <button class="btn btn-round btn-outline-success" data-toggle="modal" data-target="#modal-add-equipement">Ajouter un equipement</button>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="usersTable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Marque</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(Equipement::all() as $equipement)
                                                <tr>
                                                    <td>{{$equipement->type}}</td>
                                                    <td>{{$equipement->marque}}</td>
                                                    <td><button class="btn btn-round btn-outline-info" data-toggle="modal" data-target="#modal-update-{{$equipement->id}}">modifier</button></td>
                                                    <td><button class="btn btn-round btn-outline-danger" data-toggle="modal" data-target="#modal-delete-{{$equipement->id}}">Supprimer</button></td>
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
        <div id="modal-add-equipement" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ajouter un equipement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/admin/equipement">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Type d'équipement</label>
                                <input type="text" class="form-control" id="recipient-name" name="type">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">La marque d'équipement</label>
                                <input type="text" class="form-control" id="recipient-name" name="marque">
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
    @foreach(Equipement::all() as $equipement)
        <div class="col-md-4">
            <div id="modal-update-{{$equipement->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modifier l'equipement</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/admin/equipement/{{$equipement->id}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Type d'équipement</label>
                                    <input type="text" class="form-control" id="recipient-name" name="type" value="{{$equipement->type}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Marque d'équipement</label>
                                    <input type="text" class="form-control" id="recipient-name" name="marque" value="{{$equipement->marque}}">
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
        <div class="modal fade" id="modal-delete-{{$equipement->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alerte</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Voulez vous supprimer ce type d'equipement !
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="/admin/equipement/{{$equipement->id}}">
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
@section('extraJs')
    <script src="{{ asset('frontend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('frontend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/pages/data-table/js/data-table-custom.js') }}"></script>
    <script src="{{ asset('frontend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('frontend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
@endsection

