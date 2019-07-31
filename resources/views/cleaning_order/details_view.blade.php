@extends('layout.main_layout')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            @include('cleaning_order.partials.pageTitle')
            @include('cleaning_order.partials.beadcrumbs')
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="container row" style="padding-bottom: 0.5%">
                        <a href="{{route('admin.cleaning_order.approuve',$order->id)}}" id="add_row" class="btn btn-success pull-left">Valider la requete</a>
                        <a href="{{route('admin.cleaning_order.reject',$order->id)}}" id="add_row" class="btn btn-danger pull-left">Rejeter la requete</a>
                        {{--<button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#modal-affect-{{$order->id}}">Affecter la prise en charge</button>--}}
                        <a href="{{route('admin.cleaning_order.done',$order->id)}}" id="add_row" class="btn btn-primary pull-left">Marquer comme fait</a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Details d'ordre de nettoyage</h4>
                        </div>
                        <div class="card-block">
                            <div class="form-group row container">
                                <div class="col-sm-4 row">
                                    <h4>Réference prestation :  </h4>
                                    <span style="padding-left: 5%">{{$order->id}}</span>
                                </div>
                                <div class="col-sm-4 row">
                                    <h4>Site de nettoyage :</h4>
                                    @if($order->site_type == 'room')
                                    <span style="padding-left: 5%"> Chmabre  {{Room::find($order->site_id)->number}}</span>
                                    @else
                                        <span style="padding-left: 5%"> Bureau {{Office::find($order->site_id)->number}}</span>
                                    @endif
                                </div>
                                <div class="col-sm-4 row">
                                    <h4>Superviseur de tache :  </h4>
                                    <span style="padding-left: 5%">{{User::find($order->supervisor_id)->lastName}} {{User::find($order->supervisor_id)->firstName}}</span>
                                </div>
                            </div>
                            <div class="form-group row container">
                                <div class="col-sm-4 row">
                                    <h4>Date de creation:</h4>
                                    <span style="padding-left: 5%">{{$order->created_at->format('Y-m-d')}}</span>
                                </div>
                                <div class="col-sm-3 row">
                                    <h4>Date limite:</h4>
                                    <span style="padding-left: 5%">{{$order->limit_date->format('Y-m-d')}}</span>
                                </div>
                                <div class="col-sm-5 row">
                                    <h4>Date de réalisation:</h4>
                                    <span style="padding-left: 5%">@if($order->done_date){{$order->done_date->format('Y-m-d')}} {{$order->isLate()}}@endif</span>
                                </div>
                            </div>
                            <div class="form-group row container">
                                <div class="col-sm-4 row">
                                    <h4>Degrée d'urgence:</h4>
                                    <span style="padding-left: 5%">{{$order->degree()}}</span>
                                </div>
                                <div class="col-sm-4 row">
                                    <h4>Etat actuel:</h4>
                                    <span style="padding-left: 5%">{{$order->status()}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <h4 class="col-sm-3">Employées affectés</h4>
                                <div class="col-md-8">
                                    <table class="table table-bordered table-hover" id="tab_logic">
                                        <thead class="thead-light">
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Service</th>
                                        </thead>
                                        <tbody>
                                        @foreach($order->employee as $employee)
                                            <tr>
                                                <td>{{$employee->last_name}}</td>
                                                <td>{{$employee->first_name}}</td>
                                                <td>{{Service::find($employee->service_id)}}</td>
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

