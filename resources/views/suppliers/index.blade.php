@extends('layout.main_layout')

@section('extraCss')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

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
            <h5>Fournisseurs</h5>
            <a href="{{ route('admin.suppliers.create') }}"><button type="button" style="float: right" class="btn btn-primary" name="button">Nouveau Fournisseur</button></a>
          </div>
          <div class="card-block">
            <div class="dt-responsive table-responsive">
              <table id="usersTable" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Mobile</th>
                    <th>Crée par</th>
                    <th>Dernière modification par</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(Supplier::all() as $index => $supplier)
                  <tr>
                    <td>{{ $supplier->name }}</td>
                    <td><a href="mailto:{{ $supplier->email }}">{{ $supplier->email }}</a></td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ $supplier->mobile }}</td>
                    <td>{{ $supplier->CreatedBy->count() ? $supplier->CreatedBy->name() : '' }}</td>
                    <td>{{ $supplier->LastUpdateBy()->count() ? $supplier->LastUpdateBy->name() : '' }}</td>
                    <td>
                      <div class="dropdown-info dropdown open">
                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                          <a class="dropdown-item" href="#!">Consulter</a>
                          <a class="dropdown-item" href="{{ route('admin.suppliers.edit', $supplier->id) }}">Modifier</a>
                          <a class="dropdown-item removeSupplier" data-supplier-id="{{ $supplier->id }}" data-supplier-name="{{ $supplier->name }}" href="#!">Supprimer</a>
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
