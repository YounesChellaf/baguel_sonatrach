@extends('layout.main_layout')

@section('extraCss')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

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
            <h5>Employées</h5>
            <a href="#" class="ImportEmployeesAction">Importer</a>
            <a href="{{ route('admin.employees.create') }}"><button type="button" style="float: right" class="btn btn-primary" name="button">Nouveau Employée</button></a>
          </div>
          <div class="card-block">
            <div class="dt-responsive table-responsive">
              <table id="usersTable" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Matricule</th>
                    <th>Téléphone</th>
                    <th>Mobile</th>
                    <th>Type</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(Employee::all() as $index => $employee)
                  <tr>
                    <td>{{ $employee->name() }}</td>
                    <td>{{ $employee->employee_number }}</a></td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->mobile }}</td>
                    <td>{{ $employee->type() }}</td>
                    <td>
                      <div class="dropdown-info dropdown open">
                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                          <a class="dropdown-item" href="#!">Consulter</a>
                          <a class="dropdown-item" href="#">Modifier</a>
                          <a class="dropdown-item deleteEmployee" data-employee-id = "{{ $employee->id }}" data-employee-name = "{{ $employee->name() }}" href="#!">Supprimer</a>
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


<div class="modal fade right" id="ImportEmployeesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-full-height modal-right" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title w-100" id="myModalLabel">Importation des employées</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>
        Cette option va vous permettre d'importer une liste des employées depuis un fichier Excel / CSV
      </p>
      <form action="{{ route('admin.employees.import') }}" class="employeesImportForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Fichier: </label>
          <div class="col-sm-10">
            <input type="file" name="EmployeesFileInput" required class="form-control">
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
