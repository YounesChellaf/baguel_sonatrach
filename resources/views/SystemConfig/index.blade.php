@extends('layout.main_layout')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('SystemConfig.partials.pageTitle')
    @include('SystemConfig.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">

          <div class="row">
            <div class="col-sm-12">

              <div class="card">
                <div class="card-header">
                  <h5>Gestion des paramètres du système</h5>
                </div>
                <div class="card-block tab-icon">
                  <div class="row">
                    <div class="col-lg-12 col-xl-12">
                      <div class="sub-title">Veuillez notez que vous devez enregistrer chaque onglet que vous modifier</div>
                      @include('SystemConfig.partials.tabs')
                      @include('SystemConfig.partials.tabsContent')
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
@include('SystemConfig.partials.modals')
@endsection

@section('extraJs')
<script type="text/javascript" src="{{ asset('frontend/assets/js/modal.js') }}"></script>
<script src="{{ asset('frontend/assets/js/classie.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/modalEffects.js') }}"></script>
@endsection
