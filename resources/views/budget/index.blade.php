@extends('layout.main_layout')

@section('extraCss')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('budget.partials.pageTitle')
    @include('budget.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="row">
          <div class="col-xl-12">
            <div class="card product-progress-card">
              <div class="card-block">
                <div class="row pp-main">
                  <div class="col-xl-3 col-md-6">
                    <div class="pp-cont">
                      <div class="row align-items-center m-b-20">
                        <div class="col-auto">
                          <i class="fas fa-tools f-24 text-mute"></i>
                        </div>
                        <div class="col text-right">
                          <h2 class="m-b-0 text-c-blue">2476</h2>
                        </div>
                      </div>
                      <div class="row align-items-center m-b-15">
                        <div class="col-auto">
                          <p class="m-b-0">Maintenance</p>
                        </div>
                        <div class="col text-right">
                          <p class="m-b-0 text-c-blue"><i class="fas fa-long-arrow-alt-up m-r-10"></i>64%</p>
                        </div>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-c-blue" style="width:45%"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                    <div class="pp-cont">
                      <div class="row align-items-center m-b-20">
                        <div class="col-auto">
                          <i class="fas fa-exchange-alt f-24 text-mute"></i>
                        </div>
                        <div class="col text-right">
                          <h2 class="m-b-0 text-c-red">843</h2>
                        </div>
                      </div>
                      <div class="row align-items-center m-b-15">
                        <div class="col-auto">
                          <p class="m-b-0">Requêtes</p>
                        </div>
                        <div class="col text-right">
                          <p class="m-b-0 text-c-red"><i class="fas fa-long-arrow-alt-down m-r-10"></i>34%</p>
                        </div>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-c-red" style="width:75%"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                    <div class="pp-cont">
                      <div class="row align-items-center m-b-20">
                        <div class="col-auto">
                          <i class="fas fa-utensils f-24 text-mute"></i>
                        </div>
                        <div class="col text-right">
                          <h2 class="m-b-0 text-c-yellow">63%</h2>
                        </div>
                      </div>
                      <div class="row align-items-center m-b-15">
                        <div class="col-auto">
                          <p class="m-b-0">Restauration</p>
                        </div>
                        <div class="col text-right">
                          <p class="m-b-0 text-c-yellow"><i class="fas fa-long-arrow-alt-up m-r-10"></i>64%</p>
                        </div>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-c-yellow" style="width:65%"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                    <div class="pp-cont">
                      <div class="row align-items-center m-b-20">
                        <div class="col-auto">
                          <i class="fas fa-bed f-24 text-mute"></i>
                        </div>
                        <div class="col text-right">
                          <h2 class="m-b-0 text-c-green">41M</h2>
                        </div>
                      </div>
                      <div class="row align-items-center m-b-15">
                        <div class="col-auto">
                          <p class="m-b-0">Hébergement</p>
                        </div>
                        <div class="col text-right">
                          <p class="m-b-0 text-c-green"><i class="fas fa-long-arrow-alt-up m-r-10"></i>54%</p>
                        </div>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-c-green" style="width:35%"></div>
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
