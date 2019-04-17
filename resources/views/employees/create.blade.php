@extends('layout.main_layout')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('employees.partials.pageTitle')
    @include('employees.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>Nouveau Employée</h5>
          </div>
          <div class="card-block">
            @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong> Il y avait quelques problèmes lors la création du nouveau employée.
              <br>
              <ul class="t7wissa-errors-list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form action="{{ route('admin.employees.create.post') }}" method="post">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Nom</label>
                  <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Prénom</label>
                  <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" id="inputPassword4" placeholder="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Téléphone</label>
                  <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Mobile</label>
                  <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" id="inputPassword4" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}" id="inputAddress" placeholder="">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputAddress2">Email</label>
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="inputAddress2" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputAddress2">Matricule</label>
                  <input type="text" name="employee_number" value="{{ old('employee_number') }}" class="form-control" id="inputAddress2" placeholder="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputState">Sexe</label>
                  <select id="inputState" name="sexe" class="form-control">
                    <option selected>Choose...</option>
                    <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>Masulin</option>
                    <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>Féminin</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Type</label>
                  <select id="inputState" name="employee_type" class="form-control">
                    <option selected>Choose...</option>
                    <option {{ old('employee_type') == 'employee' ? 'selected' : '' }} value="employee">Employé Sonatrach</option>
                    <option {{ old('employee_type') == 'supplier_staff' ? 'selected' : '' }} value="supplier_staff">Employé Prestataire</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Service</label>
                  <select id="inputState" name="service_id" class="form-control">
                    <option selected>Choose...</option>
                    @foreach(Service::all() as $index => $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                  </select>
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
