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
    @include('programmed_visit.partials.pageTitle')
    @include('programmed_visit.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card product-progress-card">
          <div class="card-block">
            <div class="row pp-main">
              <div class="col-xl-3 col-md-6">
                <div class="pp-cont">
                  <div class="row align-items-center m-b-20">
                    <div class="col-auto">
                      <i class="fas fa-user-cog f-24 text-mute"></i>
                    </div>
                    <div class="col text-right">
                      <h2 class="m-b-0 ">{{Visit::where('status','pending')->count()}}</h2>
                    </div>
                  </div>
                  <div class="row align-items-center m-b-15">
                    <div class="col-auto">
                      <p class="m-b-0">Visites en attente</p>
                    </div>
                    <div class="col text-right">
                      <p class="m-b-0 ">{{Visit::where('status','pending')->count()/Visit::all()->count()*100}}%</p>
                    </div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar " ></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="pp-cont">
                  <div class="row align-items-center m-b-20">
                    <div class="col-auto">
                      <i class="fas fa-user-check f-24 text-mute"></i>
                    </div>
                    <div class="col text-right">
                      <h2 class="m-b-0 text-c-green">{{Visit::where('status','enter_validation')->count()}}</h2>
                    </div>
                  </div>
                  <div class="row align-items-center m-b-15">
                    <div class="col-auto">
                      <p class="m-b-0">Visites á entrée validée</p>
                    </div>
                    <div class="col text-right">
                      <p class="m-b-0 text-c-green">{{Visit::where('status','enter_validation')->count()/Visit::all()->count()*100}}%</p>
                    </div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-c-green" ></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="pp-cont">
                  <div class="row align-items-center m-b-20">
                    <div class="col-auto">
                      <i class="fas fa-user-check f-24 text-mute"></i>
                    </div>
                    <div class="col text-right">
                      <h2 class="m-b-0 text-c-green">{{Visit::where('status','exit_validation')->count()}}</h2>
                    </div>
                  </div>
                  <div class="row align-items-center m-b-15">
                    <div class="col-auto">
                      <p class="m-b-0">Visites á sortie validée</p>
                    </div>
                    <div class="col text-right">
                      <p class="m-b-0 text-c-green">{{Visit::where('status','exit_validation')->count()/Visit::all()->count()*100}}%</p>
                    </div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-c-green" ></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="pp-cont">
                  <div class="row align-items-center m-b-20">
                    <div class="col-auto">
                      <i class="fas fa-user-alt-slash f-24 text-mute"></i>
                    </div>
                    <div class="col text-right">
                      <h2 class="m-b-0 text-c-red">{{Visit::where('status','rejected')->count()}}</h2>
                    </div>
                  </div>
                  <div class="row align-items-center m-b-15">
                    <div class="col-auto">
                      <p class="m-b-0">Visites rejetées</p>
                    </div>
                    <div class="col text-right">
                      <p class="m-b-0 text-c-red">{{Visit::where('status','rejected')->count()/Visit::all()->count()*100}}%</p>
                    </div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-c-red" ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5>Visites</h5>
            <a href="{{ route('admin.visit.create') }}"><button type="button" style="float: right" class="btn btn-primary" name="button">Nouvelle visite</button></a>
          </div>
          <div class="card-block">
            <div class="dt-responsive table-responsive">
              <table id="usersTable" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Réference</th>
                    <th>nom de societe</th>
                    <th>date entrée</th>
                    <th>Nombre de visiteurs</th>
                    <th>Crée par</th>
                    <th>Etat</th>
                    <th>Action</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(Visit::all() as $visit)
                  <tr>
                    <td><span data-toggle="modal" data-target="#modal-visit-{{$visit->id}}">{{ $visit->company_name }}</span></td>
                    <td>{{ $visit->company_name }}</td>
                    <td>{{ $visit->in_date }}</td>
                    <td> {{$visit->visitor->count()}}</td>
                    <td>{{ $visit->CreatedBy->firstName }} {{$visit->CreatedBy->lastName}}</td>
                    <td>{{$visit->status()}}</td>
                    <td>
                      <div class="dropdown-info dropdown open">
                        <button class="btn abtn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                          <a class="dropdown-item" data-toggle="modal" data-target="#modal-visit-{{$visit->id}}">details</a>
                          @if(User::find($visit->ConcernedEmployee->id) == Auth::user())
                          <a class="dropdown-item" href="{{ route('admin.visit.enter-approve', $visit->id) }}">Valider l'entrée</a>
                          <a class="dropdown-item" href="{{ route('admin.visit.exit-approve', $visit->id) }}">Valider la sortie</a>
                          @endif
                          <a class="dropdown-item removeSupplier" data-supplier-id="" data-supplier-name="" href="{{ route('admin.visit.reject', $visit->id) }}">Rejeter</a>
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
