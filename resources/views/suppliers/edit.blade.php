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
            <h5>Modifier un Fournisseur</h5>
          </div>
          <div class="card-block">
            @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong> Il y avait quelques problèmes lors la midification du fournisseur.
              <br>
              <ul class="t7wissa-errors-list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="post" action="{{ route('admin.suppliers.edit.post') }}" class="EditSupplierForm">
              @csrf
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                  <input type="text" id="supplierName" value="{{ $supplier->name }}" name="supplierName" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nom à affiché</label>
                <div class="col-sm-10">
                  <input type="text" id="supplierDisplayName" class="form-control" value="{{ $supplier->display_name }}" name="supplierDisplayName" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" value="{{ $supplier->email }}" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Téléphone</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="phone" value="{{ $supplier->phone }}" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="mobile" value="{{ $supplier->mobile }}" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Adresse</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="address" value="{{ $supplier->street }}" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Commentaires</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="comments" placeholder="">{{ $supplier->comments }}</textarea>
                </div>
              </div>
              <input type="hidden" name="supplierId" value="{{ $supplier->id }}">
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
