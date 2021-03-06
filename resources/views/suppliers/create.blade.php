@extends('layout.main_layout')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('suppliers.partials.pageTitle')
    @include('suppliers.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>Nouveau Fournisseur {{ isset($parentSupplier) ? 'Pour : '.$parentSupplier->name : '' }}</h5>
          </div>
          <div class="card-block">
            @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong> Il y avait quelques problèmes lors la création du nouveau fournisseur.
              <br>
              <ul class="t7wissa-errors-list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="post" action="{{ isset($parentSupplier) ? route('admin.suppliers.subSuppliers.create.post', $parentSupplier->id) : route('admin.suppliers.create.post') }}" class="NewSupplierForm">
              @csrf
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                  <input type="text" id="supplierName" value="{{ old('supplierName') }}" name="supplierName" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nom à affiché</label>
                <div class="col-sm-10">
                  <input type="text" id="supplierDisplayName" class="form-control" value="{{ old('supplierDisplayName') }}" name="supplierDisplayName" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Téléphone</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Adresse</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Commentaires</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="comments" placeholder="">{{ old('comments') }}</textarea>
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
