@extends('layout.main_layout')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('exit_permissions.partials.pageTitle')
    @include('exit_permissions.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>Nouveau bon de sortie</h5>
          </div>
          <div class="card-block">
            @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong> Il y avait quelques problèmes lors la création du nouveau compte.
              <br>
              <ul class="t7wissa-errors-list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="post" action="{{ route('admin.ExitPermissions.index.create.post') }}" class="NewExitPermissionForm">
              @csrf
              <div class="row">
                <div class="col-sm-12 col-xl-4 m-b-30">
                  <p>Date de sortie</p>
                  <input class="form-control" name="exitDate" type="date" />
                </div>
                <div class="col-sm-12 col-xl-4">
                  <p>Heure de sortie</p>
                  <input class="form-control" name="exitTime" type="time" />
                </div>
                <div class="col-sm-12 col-xl-4">
                  <p>Heure de retour</p>
                  <input class="form-control" name="entranceTime" type="time"/>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12 col-xl-4 m-b-30">
                  <p>Motif de sortie</p>
                  <select class="form-control" name="exitReason">
                    <option value=""></option>
                    <option value="mission">Mission</option>
                    <option value="sickness">Maladie</option>
                    <option value="holiday">Jour férié</option>
                    <option value="urgency">Urgence</option>
                  </select>
                </div>
                <div class="col-sm-12 col-xl-8">
                  <p>Commentaires</p>
                  <textarea class="form-control" name="comments"></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
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
@endsection
