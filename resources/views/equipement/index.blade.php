@extends('layout.main_layout')
@include('layout.assets.datatable._css')
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
                                        <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>Numero de reference</th>
                                                <th>Floor</th>
                                                <th>Status</th>
                                                <th>Bloc</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(\App\Office::all() as $office)
                                                <tr>
                                                    <td>{{$office->number}}</td>
                                                    <td>{{$office->floor}}</td>
                                                    <td>{{$office->active}}</td>
                                                    <td>{{$office->bloc->name}}</td>
                                                    <td><button class="btn btn-round btn-outline-info" data-toggle="modal" data-target="#modal-update-{{$office->id}}">modifier</button></td>
                                                    <td><button class="btn btn-round btn-outline-danger" data-toggle="modal" data-target="#modal-delete-{{$office->id}}">Supprimer</button></td>
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
                        <form method="post" action="/admin/office">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Numero de bureau</label>
                                <input type="text" class="form-control" id="recipient-name" name="number">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">floor</label>
                                <input type="text" class="form-control" id="recipient-name" name="floor">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Active :</label>
                                <input type="checkbox" class="js-single" name="active" checked />
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <select name="bloc_id" class="form-control">
                                        <option value="">Choisir un bloc</option>
                                        @foreach(\App\Bloc::all() as $bloc)
                                        <option value="{{$bloc->id}}">{{$bloc->name}}</option>
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
    @foreach(\App\Office::all() as $office)
        <div class="col-md-4">
            <div id="modal-update-{{$office->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modifier le bureau</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/admin/office/{{$office->id}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Numero du bureau</label>
                                    <input type="text" class="form-control" id="recipient-name" name="number" value="{{$office->number}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Floor</label>
                                    <input type="text" class="form-control" id="recipient-name" name="floor" value="{{$office->floor}}">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <select name="bloc_id" class="form-control">
                                            <option value="{{$office->bloc->id}}">{{$office->bloc->name}}</option>
                                            @foreach(\App\Bloc::all() as $bloc)
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
                                    <button type="button" class="btn btn-round btn-outline-danger waves-effect" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-round btn-outline-success waves-effect waves-light">Enregistrer</button>
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
                        <form method="POST" action="/admin/office/{{$office->id}}">
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

