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
          Format de référence<i class="fas fa-info-circle exitPermissionRefHelperModalAction" data-modal="modal-1"></i>
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('ep_ref_format') }}" name="ep_ref_format">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
  </div>
</div>
