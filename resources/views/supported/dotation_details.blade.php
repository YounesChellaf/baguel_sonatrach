@extends('layout.main_layout')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            @include('supported.partials.pageTitle')
            @include('supported.partials.beadcrumbs')
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="container row" style="padding-bottom: 0.5%">
                        <a href="{{route('admin.support.export',$support->id)}}" id="add_row" class="btn btn-primary pull-left">Imprimer en PDF</a>
                        <a href="{{route('admin.dotation.support.approve',$support->id)}}" id="add_row" class="btn btn-success pull-left">Valider la requete</a>
                        <a href="{{route('admin.dotation.support.reject',$support->id)}}" id="add_row" class="btn btn-danger pull-left">Rejeter la requete</a>
                        <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#modal-affect-employee">Affecter la prise en charge</button>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Details Prise en charge</h4>
                        </div>
                        <div class="card-block">
                            <div class="form-group row container">
                                <div class="col-sm-4 row">
                                    <h4>Réference prestation :  </h4>
                                    <span style="padding-left: 5%">  {{$support->id}}</span>
                                </div>
                                <div class="col-sm-4 row">
                                    <h4>Demandeur :  </h4>
                                    <span style="padding-left: 5%">  {{$support->demandeur($support->concerned_id)->lastName}}</span>
                                </div>
                                <div class="col-sm-4 row">
                                    <h4>Bon de commande :</h4>
                                    <span style="padding-left: 5%">{{$support->purchase_order}}</span>
                                </div>
                            </div>
                            <div class="form-group row container">
                                <div class="col-sm-4 row">
                                    <h4>Debut prestation:</h4>
                                    <span style="padding-left: 5%">{{$support->date_from}}</span>
                                </div>
                                <div class="col-sm-4 row">
                                    <h4>Fin prestation:</h4>
                                    <span style="padding-left: 5%">{{$support->date_to}}</span>
                                </div>
                                <div class="col-sm-3 row">
                                    <h4>Etat</h4>
                                    <span style="padding-left: 5%">{{$support->status()}}</span>
                                </div>
                            </div>
                            <div class="form-group row container">
                                <div class="col-sm-4 row">
                                    <h4>Imputation :</h4>
                                    <span style="padding-left: 5%">{{Service::find($support->imputation)->name}}</span>
                                </div>
                                <div class="col-sm-4 row">
                                    <h4>Affecté á:</h4>
                                    <span style="padding-left: 5%">{{$support->affected_employee()}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <h4 class="col-sm-3">Prestation demandé</h4>
                                <div class="col-md-8">
                                    <table class="table table-bordered table-hover" id="tab_logic">
                                        <thead class="thead-light">
                                        <th>Désugnation</th>
                                        <th>Quantité</th>
                                        <th>Observation</th>
                                        </thead>
                                        <tbody>
                                        @foreach($support->cleaning_product as $prestation)
                                            <tr>
                                                <td>{{$prestation->product_name}}</td>
                                                <td>{{$prestation->quantity}}</td>
                                                <td>{{$prestation->observation}}</td>
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
        <div class="col-md-4">
            <div id="modal-affect-employee" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Affecter un employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="service-add" action="{{ route('dotation.support.affect',$support->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <select name="employee_id" class="form-control">
                                            <option value="">Choisir un employee</option>
                                            @foreach(Employee::all() as $employee)
                                                <option value="{{$employee->id}}">{{$employee->last_name}} {{$employee->first_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Affecter</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection

