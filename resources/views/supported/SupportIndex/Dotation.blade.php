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
                                        <th>Bon de commande</th>
                                        <th>Demandeur</th>
                                        <th>date de demande</th>
                                        <th>Nombre produits demande</th>
                                        <th>Etat</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(DotationSupport::all() as $dotation)
                                        <tr>
                                            <td>{{$dotation->id}}</td>
                                            <td>{{$dotation->purchase_order}}</td>
                                            <td>{{ $dotation->demandeur($dotation->concerned_id)->lasttName}}{{ $dotation->demandeur($dotation->concerned_id)->firstName}}</td>
                                            <td>{{ $dotation->created_at->format('d M Y')}}</td>
                                            <td> {{$dotation->cleaning_product->count()}}</td>
                                            <td>{{$dotation->status()}}</td>
                                            <td>
                                                <div class="dropdown-info dropdown open">
                                                    <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                        <a class="dropdown-item" href="{{route('admin.support.dotation.details',$dotation->id)}}">Details</a>
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
@endsection

@section('extraJs')
    <script src="{{ asset('frontend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('frontend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/pages/data-table/js/data-table-custom.js') }}"></script>
    <script src="{{ asset('frontend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('frontend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
@endsection
