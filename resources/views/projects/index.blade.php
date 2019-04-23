@extends('layout.main_layout')

@section('extraCss')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('projects.partials.pageTitle')
    @include('projects.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>Projets</h5>
            <a href="#!"><button type="button" style="float: right" class="btn btn-primary newProjectAction" name="button">Nouveau projet</button></a>

          </div>
          <div class="card-block">
            <div class="dt-responsive table-responsive">
              <table id="usersTable" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Désignaton</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Site</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(Project::all() as $index => $project)
                  <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->start_at }}</td>
                    <td>{{ $project->end_at }}</td>
                    <td>{{ $project->site }}</td>
                    <td>{{ $project->status() }}</td>
                    <td></td>
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

<div class="modal fade right" id="NewProjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-full-height modal-right" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title w-100" id="myModalLabel">Crée un nouveau projet</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>

      </p>
      <form action="{{ route('admin.projects.create') }}" class="productsImportForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nom</label>
          <div class="col-sm-10">
            <input type="text" name="ProjectName" required class="form-control">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Date début</label>
          <div class="col-sm-10">
            <input type="date" name="ProjectStartAt" required class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Date fin</label>
          <div class="col-sm-10">
            <input type="date" name="ProjectEndsAt" required class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Compte Analytique</label>
          <div class="col-sm-10">
            <input type="text" name="ProjectAC" required class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Site</label>
          <div class="col-sm-10">
            <input type="text" name="ProjectSite" required class="form-control">
          </div>
        </div>
        <button type="submit" class="btn btn-info">Enregistrer</button>
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
