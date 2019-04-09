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
            <h5>Modifier un compte utilisateur</h5>
          </div>
          <div class="card-block">
            @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong> Il y avait quelques problèmes lors la modification du compte.
              <br>
              <ul class="t7wissa-errors-list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="post" action="{{ route('admin.users.edit.post') }}" class="EditUserForm">
              @csrf
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                  <input type="text" id="firstName" value="{{ $user->firstName ? $user->firstName : old('firstName') }}" name="firstName" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Prénom</label>
                <div class="col-sm-10">
                  <input type="text" id="lastName" class="form-control" value="{{ $user->lastName ? $user->lastName : old('lastName') }}" name="lastName" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" value="{{ $user->email ? $user->email : old('email') }}" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Département</label>
                <div class="col-sm-10">
                  <select class="form-control" name="department">
                    <option value="">Sélectionner le département</option>
                    @foreach(Department::all() as $index => $department)
                      <option value="{{ $department->id }}" {{ $department->id == $user->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                  <select class="form-control" name="account_type">
                    <option value="">Sélectionner le type d'employee</option>
                    <option value="employee" {{ $user->account_type == 'employee' ? 'selected' : '' }}>Employée</option>
                    <option value="supplier_staff" {{ $user->account_type == 'supplier_staff' ? 'selected' : '' }}>Staff de fournisseur</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nom d'utilisateur</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="username" value="{{ $user->username ? $user->username : old('username') }}" name="username" placeholder="" readonly>
                </div>
              </div>
              <input type="hidden" name="userId" value="{{ $user->id }}">
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
