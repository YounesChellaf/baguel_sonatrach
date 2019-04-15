<div class="modal fade" id="exitPermissionRefHelperModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Comment définir le format de référence du document de bon de sortie</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div>
        <span>Le format de référence doit respecter: <strong>{PREFIX}/{YEAR}/{SN}</strong>
          <ol>
            <li>exemple: BS/2019/00001</li>
            <li>{PREFIX}: Le préfix de document de bon de sortie</li>
            <li>{YEAR}: L'année courrante</li>
            <li>{SN}: Le numéro séquentiel de document</li>
            <li>/ : Le séparateur entre les valeurs précédentes</li>
          </ol>
        </span>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
    </div>
  </div>
</div>
</div>


<div class="modal fade right" id="NewLifeBaseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-full-height modal-right" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title w-100" id="myModalLabel">Crée une nouvelle base de vie</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div>
        <form class="" action="{{ route('admin.lifebase.save') }}" method="post">
          @csrf
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nom</label>
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
          <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">Fermer</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade right" id="NewAdministrationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-full-height modal-right" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title w-100" id="myModalLabel">Crée une nouvelle base de vie</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div>
        <form class="" action="{{ route('admin.administration.save') }}" method="post">
          @csrf
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required value="" name="admin_name">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Addresse</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required value="" name="admin_address">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Default</label>
            <div class="col-sm-10">
              <input type="checkbox" class="js-single" name="is_default_lb"/>
            </div>
          </div>
          <button type="submit" class="btn btn-success waves-effect">Enregistrer</button>
          <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">Fermer</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<div class="md-overlay"></div>
