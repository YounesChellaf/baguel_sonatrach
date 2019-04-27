@extends('layout.main_layout')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('users.partials.pageTitle')
    @include('users.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>{{ $user->name() }}</h5>
          </div>
          <div class="card-block">
            <div class="row">
              <div class="col-md-4">
                <h4>Nom :</h4> <p>{{ $user->name() }}</p>
              </div>
              <div class="col-md-4">
                <h4>Date de dernière conex..</h4>
                <p>{{ $user->last_connexion_at }}</p>
              </div>
              <div class="col-md-4">
                <h4>Type</h4>
                <p>{{ $user->accountType() }}</p>
              </div>
            </div>
            <br>
            <div class="row m-b-30">
              <div class="col-lg-12 col-xl-12">
                <ul class="nav nav-tabs md-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#activitiesLog" role="tab" aria-selected="true">Activitées</a>
                    <div class="slide"></div>
                  </li>
                </ul>

                <div class="tab-content card-block">
                  <div class="tab-pane active show" id="activitiesLog" role="tabpanel">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Document concerné</th>
                            <th>Date d'opération</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($actions as $index => $action)
                          <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ logDescription($action->description) }}</td>
                            <td><a href="#" class="getActivityLogChanges" data-log-id = {{ $action->id }}>Cliquer ici pour avoir les Modifications</a></td>
                            <td>{{ $action->created_at }}</td>
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
  </div>
</div>
</div>
</div>
</div>
</div>


<div class="modal fade" id="userActivityEntryDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Détails</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div>
        <span>Type d'opération: <strong><p id="activityOpType"></p></strong></span>
        <span>Date de l'opération: <strong><p id="activityOpDate"></p></strong></span>
        <span>Document concerné: <strong><p id="activityOpDocument"></p></strong></span>
        <span>Détails: <p id="activityOpDetails"></p></span>
        <span><a href="#" target="_blank" id="activityOpLink">Consulter</a></span>
      </span>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
  </div>
</div>
</div>
</div>
@endsection
