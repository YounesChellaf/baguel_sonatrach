@extends('layout.main_layout')

@section('extraCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

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
                    <div class="card">
                        <div class="card-header">
                            <h5>Demande dotation en produit d'entretien</h5>
                            <a href="{{ route('admin.support.create', 'dotation') }}"><button type="button" style="float: right" class="btn btn-primary" name="button">Nouvelle réservation</button></a>
                        </div>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="usersTable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th>Réference</th>
                                        <th>Demandeur</th>
                                        <th>date de demande</th>
                                        <th>Nombre produits demande</th>
                                        <th>Etat</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Support::where('type','dotation')->get() as $support)
                                        <tr>
                                            <td>{{$support->id}}</td>
                                            <td>{{ $support->demandeur($support->concerned_id)->lasttName}}{{ $support->demandeur($support->concerned_id)->firstName}}</td>
                                            <td>{{ $support->created_at->format('d M Y')}}</td>
                                            <td> {{$support->prestation->count()}}</td>
                                            <td>{{$support->status()}}</td>
                                            <td>
                                                <div class="dropdown-info dropdown open">
                                                    <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                        <a class="dropdown-item" href="{{route('admin.support.details',$support->id)}}">Details</a>
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
    @foreach(Visit::all() as $visit)
        <div class="modal fade" id="modal-visit-{{$visit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Details du visit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container col-md-10 model-info-visit" style="margin: 5%">
                        <div class=" row">
                            <h6>Réference du visite :</h6>
                            <p>{{$visit->company_name}}</p>
                        </div>
                        <div class=" row">
                            <h6>Nom de la societé :</h6>
                            <p>{{$visit->company_name}}</p>
                        </div>
                        <div class=" row">
                            <h6>Employée concernée:</h6>
                            <p>{{$visit->employee->first()->last_name}} {{$visit->employee->first()->first_name}}</p>
                        </div>
                        <div class=" row">
                            <h6>Crée par  :</h6>
                            <p>{{User::find($visit->created_by)->firstName}} {{User::find($visit->created_by)->lastName}}</p>
                        </div>
                        <div class=" row">
                            <h6>Date entrée :</h6>
                            <p>{{$visit->in_date}}</p>
                        </div>
                        <div class=" row">
                            <h6>Date sortie :</h6>
                            <p>{{$visit->out_date}}</p>
                        </div>
                        <div class="row">
                            <h6>Les visiteurs :</h6>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Piece identité</th>
                                    <th scope="col">Fonction</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($visit->visitor as $visitor)
                                    <tr>
                                        <td>{{$visitor->last_name}}</td>
                                        <td>{{$visitor->first_name}}</td>
                                        <td>{{$visitor->identity_card_number}}</td>
                                        <td>{{$visitor->function}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class=" row">
                            <h6>L'état :</h6>
                            <p>{{$visit->status()}}</p>
                        </div>
                        <div class=" row">
                            <h6>Reason de visite:</h6>
                            <p>{{$visit->reason}}</p>
                        </div>
                        <div class=" row">
                            <h6>Remarques :</h6>
                            <p>{{$visit->remark}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('extraJs')
    <script src="{{ asset('frontend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('frontend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/pages/data-table/js/data-table-custom.js') }}"></script>
    <script src="{{ asset('frontend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('frontend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
@endsection
