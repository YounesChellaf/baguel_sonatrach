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
            <h5>Fournisseurs {{ isset($parentSupplier) ? 'De: '.$parentSupplier->name : '' }}</h5>
            <a href="#" class="ImportSuppliersAction">Importer</a>
            <a href="{{ isset($parentSupplier) ? route('admin.suppliers.subSuppliers.create', $parentSupplier->id) : route('admin.suppliers.create') }}"><button type="button" style="float: right" class="btn btn-primary" name="button">Nouveau Fournisseur</button></a>
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
                  @if(isset($suppliers))
                    @foreach($suppliers as $index => $supplier)
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
                  @else
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
                            <a class="dropdown-item" href="{{ route('admin.suppliers.subSuppliers', $supplier->id) }}">Sous fournisseurs</a>
                            <a class="dropdown-item" href="{{ route('admin.suppliers.edit', $supplier->id) }}">Modifier</a>
                            <a class="dropdown-item removeSupplier" data-supplier-id="{{ $supplier->id }}" data-supplier-name="{{ $supplier->name }}" href="#!">Supprimer</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade right" id="ImportSuppliersModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-full-height modal-right" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title w-100" id="myModalLabel">Importation des Fournisseurs</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>
        Cette option va vous permettre d'importer une liste des fournisseurs depuis un fichier Excel / CSV
      </p>
      <form action="{{ route('admin.suppliers.import') }}" class="SuppliersImportForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Fichier: </label>
          <div class="col-sm-10">
            <input type="file" name="SuppliersFileInput" required class="form-control">
          </div>
        </div>
        <button type="submit" class="btn btn-info">Importer</button>
      </form>
    </ul>
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
