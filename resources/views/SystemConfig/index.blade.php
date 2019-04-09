@extends('layout.main_layout')
@section('extraCss')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/component.css') }}">
@endsection
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
                      <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#exitPermission" role="tab"><i class="fas fa-sign-out-alt"></i> Bon de sortie</a>
                          <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#profile5" role="tab">Profile</a>
                          <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#messages5" role="tab">Messages</a>
                          <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#settings5" role="tab">Settings</a>
                          <div class="slide"></div>
                        </li>
                      </ul>
                      <div class="tab-content tabs-left-content card-block" style="width: 100%;">
                        <div class="tab-pane active" id="exitPermission" role="tabpanel">
                          <div class="card-block">
                            <h4 class="sub-title">Bon de sortie</h4>
                            <form  method="post" action="{{ route('admin.SystemConfig.save') }}">
                              @csrf
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Prefix</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="{{ SystemConfig::config('ep_prefix') }}" name="ep_prefix">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Positions</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="{{ SystemConfig::config('ep_sn_positions') }}" name="ep_sn_positions">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">
                                  Format de référence<i class="md-trigger fas fa-info-circle" data-modal="modal-1"></i>
                                </label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="{{ SystemConfig::config('ep_ref_format') }}" name="ep_ref_format">
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
      </div>
    </div>
  </div>
</div>

<div class="md-modal md-effect-1" id="modal-1">
  <div class="md-content">
    <h3>Comment définir le format de référence ?</h3>
    <div>
      <span>Le format de référence doit respecter: {PREFIX}/{YEAR}/{SN}
        <ol>
          <li>exemple: BS/2019/00001</li>
          <li>{PREFIX}: Le préfix de document de bon de sortie</li>
          <li>{YEAR}: L'année courrante</li>
          <li>{SN}: Le numéro séquentiel de document</li>
          <li>/ : Le séparateur entre les valeurs précédentes</li>
        </ol>
      </span>
      <button type="button" class="btn btn-primary waves-effect md-close">Fermer</button>
    </div>
  </div>
</div>
<div class="md-overlay"></div>
@endsection

@section('extraJs')
<script type="text/javascript" src="{{ asset('frontend/assets/js/modal.js') }}"></script>
<script src="{{ asset('frontend/assets/js/classie.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/modalEffects.js') }}"></script>
@endsection
