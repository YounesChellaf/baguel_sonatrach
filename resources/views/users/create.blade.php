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
            <h5>Nouveau compte utilisateur</h5>
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
            <form method="post" action="{{ route('admin.users.create.post') }}" class="NewUserForm">
              @csrf
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                  <input type="text" id="firstName" value="{{ old('firstName') }}" name="firstName" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Prénom</label>
                <div class="col-sm-10">
                  <input type="text" id="lastName" class="form-control" value="{{ old('lastName') }}" name="lastName" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Département</label>
                <div class="col-sm-10">
                  <select class="form-control" name="department">
                    <option value="">Sélectionner le département</option>
                    @foreach(Service::all() as $index => $department)
                      <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                  <select class="form-control" name="account_type">
                    <option value="">Sélectionner le type d'employee</option>
                    <option value="employee">Employée</option>
                    <option value="supplier_staff">Staff de fournisseur</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Struture</label>
                <div class="col-sm-10">
                  <select class="form-control userAccountStructure" name="account_structure">
                    <option value="">Sélectionner</option>
                    <option value="lifebase">Base de vie</option>
                    <option value="administration">Administration</option>
                  </select>
                </div>
              </div>
              <div class="form-group row lifeBaseOptions">
                <label class="col-sm-2 col-form-label">Base de vie</label>
                <div class="col-sm-10">
                  <select class="form-control" name="lifebase_id">
                    <option value="">Sélectionner</option>
                    @foreach(LifeBase::all() as $index => $lifebase)
                      <option value="{{ $lifebase->id }}">{{ $lifebase->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row administrationOptions">
                <label class="col-sm-2 col-form-label">Administration</label>
                <div class="col-sm-10">
                  <select class="form-control" name="administration_id">
                    <option value="">Sélectionner</option>
                    @foreach(Administration::all() as $index => $admin)
                      <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nom d'utilisateur</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="username" value="{{ old('username') }}" name="username" placeholder="" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mot de passe</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="password" required id="password" placeholder="">
                </div>
                <div class="col-sm-4">
                  <button type="button" class="btn btn-danger generateSecuredPassword" required name="button">Génerer</button>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Confirmation de Mot de passe</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="password_c" placeholder="">
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
