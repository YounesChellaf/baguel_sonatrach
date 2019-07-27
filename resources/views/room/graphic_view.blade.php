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
            @include('room.partials.pageTitle')
            @include('room.partials.beadcrumbs')
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                                <div class="card product-progress-card">
                                    <div class="card-block">
                                        <div class="row pp-main">

                                            <div class="col-xl-4 col-md-6">
                                                <div class="pp-cont">
                                                    <form action="{{route('admin.room.statistic')}}" method="POST">
                                                        @csrf
                                                    <div class="row align-items-center m-b-20">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">A partir</label>
                                                            <input type="date" name="date_from"  class="form-control" id="inputEmail4" placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputPassword4">Jusqu'á</label>
                                                            <input type="date" name="date_to" class="form-control" id="inputPassword4" placeholder="">
                                                        </div>
                                                        <button type="submit" class="btn btn-outline-primary" style="width: 100%">Recherche</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="pp-cont">
                                                    <div class="row align-items-center m-b-20">
                                                        <div class="col-auto">
                                                            <i class="fas fa-bed f-24 text-mute"></i>
                                                        </div>
                                                        <div class="col text-right">
                                                            <h2 class="m-b-0 text-c-red">{{$occuped_room}}</h2>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center m-b-15">
                                                        <div class="col-auto">
                                                            <p class="m-b-0">Chambres occupées</p>
                                                        </div>
                                                        <div class="col text-right">
                                                            <p class="m-b-0 text-c-red">{{$occuped_room/Room::all()->count()*100}}%</p>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-c-red" style="width:{{$occuped_room/Room::all()->count()*100}}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="pp-cont">
                                                    <div class="row align-items-center m-b-20">
                                                        <div class="col-auto">
                                                            <i class="fas fa-bed f-24 text-mute"></i>
                                                        </div>
                                                        <div class="col text-right">
                                                            <h2 class="m-b-0 text-c-green">{{Room::all()->count() - $occuped_room}}</h2>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center m-b-15">
                                                        <div class="col-auto">
                                                            <p class="m-b-0">Chambres libre</p>
                                                        </div>
                                                        <div class="col text-right">
                                                            <p class="m-b-0 text-c-green">{{(Room::all()->count() - $occuped_room)/Room::all()->count()*100}}%</p>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-c-green" style="width:{{(Room::all()->count() - $occuped_room)/Room::all()->count()*100}}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                <div class="card-block">
                                    @foreach(Room::all() as $room)

                                        <div style="display: inline-block" class="col-md-2">
                                        @if($room->state())
                                            <img style="height: 10% ; width: 90% " src="{{asset('frontend/assets/images/occuped-room.jpg')}}" alt="">
                                        @else
                                            <img style="height: 10% ; "  src="{{asset('frontend/assets/images/free-room.jpg')}}" alt="">
                                        @endif
                                         <h5 style="text-align: center">{{$room->bloc->name}} {{$room->number}}</h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
