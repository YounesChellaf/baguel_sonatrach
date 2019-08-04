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
                            <h5>Les prise en charge des visiteurs</h5>
                            <a href="{{ route('admin.support.create', 'visitor') }}"><button type="button" style="float: right" class="btn btn-primary" name="button">Nouvelle réservation</button></a>
                        </div>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="usersTable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th>Réf</th>
                                        <th>Demandeur</th>
                                        <th>Organisme d'acceuil</th>
                                        <th>date de demande</th>
                                        <th>Visiteurs</th>
                                        <th>Type prise en charge</th>
                                        <th>Etat</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(VisitorSupport::all() as $support)
                                        <tr>
                                            <td>{{$support->id}}</td>
                                            <td>{{ $support->demandeur($support->concerned_id)->lasttName}}{{ $support->demandeur($support->concerned_id)->firstName}}</td>
                                            <td>{{ Service::find($support->service_id)->name}}</td>
                                            <td>{{ $support->created_at->format('d M Y')}}</td>
                                            <td> {{$support->visitor->count()}}</td>
                                            <td> {{$support->support_duration_type}}</td>
                                            <td>{{$support->status()}}</td>
                                            <td>
                                                <div class="dropdown-info dropdown open">
                                                    <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                        <a class="dropdown-item" href="{{route('admin.visitor.support.details',$support->id)}}">Details</a>
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
