<div class="tab-pane active" id="lifebase" role="tabpanel">
  <div class="card-block">
    <h4 class="sub-title">Base de vie</h4>
    <form  method="post" action="{{ route('admin.SystemConfig.save') }}">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Multi base de vies</label>
        <div class="col-sm-10">
          <input type="checkbox" {{ SystemConfig::config('multi_life_base_system') ? 'checked' : '' }} class="js-single multiLifeBaseSystem" name="multi_life_base_system"/>
        </div>
      </div>

      <div class="form-group row lifebasesList">
        <label class="col-sm-2 col-form-label">Bases de vie</label>
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
                @foreach(LifeBase::all() as $index => $lifebase)
                <tr>
                  <th scope="row">1</th>
                  <td>{{ $lifebase->name }}</td>
                  <td>{{ $lifebase->address }}</td>
                  <td>#</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <a href="#" class="newLifeBaseAction" style="float: right;">Ajouter</a>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
  </div>
</div>
