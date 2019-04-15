<div class="tab-pane active" id="lifebase" role="tabpanel">
  <div class="card-block">
    <h4 class="sub-title">Administrations</h4>
    <form  method="post" action="{{ route('admin.SystemConfig.save') }}">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Multi administrations</label>
        <div class="col-sm-10">
          <input type="checkbox" {{ SystemConfig::config('multi_administrations_system') ? 'checked' : '' }} class="js-single multiAdministrationsSystem" name="multi_administrations_system"/>
        </div>
      </div>

      <div class="form-group row lifebasesList">
        <label class="col-sm-2 col-form-label">Administrations</label>
        <div class="col-sm-10">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Désignation</th>
                  <th>addresse</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach(Administration::all() as $index => $administration)
                <tr>
                  <th scope="row">1</th>
                  <td>{{ $administration->name }}</td>
                  <td>{{ $administration->address }}</td>
                  <td>#</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <a href="#" class="md-trigger" data-modal="NewAdministrationModal" style="float: right;">Ajouter</a>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
  </div>
</div>
