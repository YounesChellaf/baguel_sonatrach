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

<div class="md-modal md-effect-1" id="NewLifeBaseModal">
  <div class="md-content">
    <h3>Crée une nouvelle base de vie</h3>
    <div>
      <form class="" action="{{ route('admin.lifebase.save') }}" method="post">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Désignation</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" required value="" name="lb_name">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Addresse</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" required value="" name="lb_address">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Default</label>
          <div class="col-sm-10">
            <input type="checkbox" class="js-single" name="is_default_lb"/>
          </div>
        </div>
        <button type="submit" class="btn btn-success waves-effect">Enregistrer</button>
        <button type="button" class="btn btn-warning waves-effect md-close">Fermer</button>
      </form>
    </div>
  </div>
</div>

<div class="md-modal md-effect-1" id="NewAdministrationModal">
  <div class="md-content">
    <h3>Crée une nouvelle administration</h3>
    <div>
      <form class="" action="{{ route('admin.lifebase.save') }}" method="post">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Désignation</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" required value="" name="lb_name">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Addresse</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" required value="" name="lb_address">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Default</label>
          <div class="col-sm-10">
            <input type="checkbox" class="js-single" name="is_default_lb"/>
          </div>
        </div>
        <button type="submit" class="btn btn-success waves-effect">Enregistrer</button>
        <button type="button" class="btn btn-warning waves-effect md-close">Fermer</button>
      </form>
    </div>
  </div>
</div>
<div class="md-overlay"></div>
