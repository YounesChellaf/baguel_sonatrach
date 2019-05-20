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
                        <a id="add_row" class="btn btn-primary pull-left">Imprimer en PDF</a>
                        <a href="{{route('admin.support.approve',$support->id)}}" id="add_row" class="btn btn-success pull-left">Valider la requete</a>
                        <a href="{{route('admin.support.reject',$support->id)}}" id="add_row" class="btn btn-danger pull-left">Rejeter la requete</a>
                        <a href="{{route('admin.support.affect',$support->id)}}" id="add_row" class="btn btn-primary pull-left">Affecter la prise en charge</a>
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
                                        <h4>Motif prestation :</h4>
                                        <span style="padding-left: 5%">{{$support->motif}}</span>
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
                            <div class="form-group row">
                                <h4 class="col-sm-2">Remarques :</h4>
                                <div class="col-sm-10">
                                    <p>{{$support->remark}}</p>
                                </div>
                            </div>
                                <div class="form-group row">
                                    <h4 class="col-sm-3">Prestation demandé</h4>
                                    <div class="col-md-8">
                                        <table class="table table-bordered table-hover" id="tab_logic">
                                            <thead class="thead-light">
                                            <th>Produit</th>
                                            <th>Quantité</th>
                                            </thead>
                                            <tbody>
                                            @foreach($support->prestation as $prestation)
                                            <tr>
                                                <td>{{$prestation->product->name}}</td>
                                                <td>{{$prestation->quantity}}</td>
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

@endsection

