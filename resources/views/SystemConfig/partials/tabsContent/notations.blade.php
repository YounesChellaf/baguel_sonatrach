<div class="tab-pane active" id="lifebase" role="tabpanel">
  <div class="card-block">
    <h4 class="sub-title">Notations</h4>
    <!-- Suppliers Notation section  -->
    <hr>
    <h4>Notation des fournisseurs</h4>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Critères de notation</label>
      <div class="col-sm-10">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Désignation</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach(NotationCriteria::suppliersNoationCriterias() as $index => $criteria)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $criteria->criteria_value }}</td>
                <td>#</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="#" class="newSupplierNotationCriteriaAction" style="float: right;">Ajouter</a>
        </div>
      </div>
    </div>
    <form action="{{ route('admin.SystemConfig.save') }}" method="post">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Préfix</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('spn_prefix') }}" name="spn_prefix">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Positions</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('spn_positions') }}" name="spn_positions">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Format</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('spn_ref_format') }}" name="spn_ref_format">
        </div>
        <button style="float: right;" type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>
    <!--  Delivery Notation section  -->
    <hr>
    <h4>Control de reception de marchandises</h4>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Critères de notation</label>
      <div class="col-sm-10">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Désignation</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach(NotationCriteria::deliveryNoationCriterias() as $index => $criteria)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $criteria->criteria_value }}</td>
                <td>#</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="#" class="newDeliveryNotationCriteriaAction" style="float: right;">Ajouter</a>
        </div>
      </div>
    </div>
    <form action="{{ route('admin.SystemConfig.save') }}" method="post">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Préfix</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('shn_prefix') }}" name="shn_prefix">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Positions</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('shn_positions') }}" name="shn_positions">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Format</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('shn_ref_format') }}" name="shn_ref_format">
        </div>
        <button style="float: right;" type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>
    <!--  Kichen Notation section  -->
    <hr>
    <h4>Control de cuisine</h4>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Critères de notation</label>
      <div class="col-sm-10">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Désignation</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach(NotationCriteria::kitchenNotationCriterias() as $index => $criteria)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $criteria->criteria_value }}</td>
                <td>#</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="#" class="newKitchenNotationCriteriaAction" style="float: right;">Ajouter</a>
        </div>
      </div>
    </div>
    <form action="{{ route('admin.SystemConfig.save') }}" method="post">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Préfix</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('ktn_prefix') }}" name="ktn_prefix">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Positions</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('ktn_positions') }}" name="ktn_positions">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Format</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('ktn_ref_format') }}" name="ktn_ref_format">
        </div>
        <button style="float: right;" type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>

    <!--  Restaurant Notation section  -->
    <hr>
    <h4>Control de Restaurant & Foyer</h4>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Critères de notation</label>
      <div class="col-sm-10">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Désignation</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach(NotationCriteria::restaurantNotationCriterias() as $index => $criteria)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $criteria->criteria_value }}</td>
                <td>#</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="#" class="newRestaurantNotationCriteriaAction" style="float: right;">Ajouter</a>
        </div>
      </div>
    </div>
    <form action="{{ route('admin.SystemConfig.save') }}" method="post">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Préfix</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('rfn_prefix') }}" name="rfn_prefix">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Positions</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('rfn_positions') }}" name="rfn_positions">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Format</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('rfn_ref_format') }}" name="rfn_ref_format">
        </div>
        <button style="float: right;" type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>

    <!--  Restaurant Notation section  -->
    <hr>
    <h4>Control de Stockage & Magasin</h4>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Critères de notation</label>
      <div class="col-sm-10">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Désignation</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach(NotationCriteria::storageNotationCriterias() as $index => $criteria)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $criteria->criteria_value }}</td>
                <td>#</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="#" class="newStorageNotationCriteriaAction" style="float: right;">Ajouter</a>
        </div>
      </div>
    </div>
    <form action="{{ route('admin.SystemConfig.save') }}" method="post">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Préfix</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('smn_prefix') }}" name="smn_prefix">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Positions</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('smn_positions') }}" name="smn_positions">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Format</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('smn_ref_format') }}" name="smn_ref_format">
        </div>
        <button style="float: right;" type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>

    <!--  rooms Notation section  -->
    <hr>
    <h4>Control de chambres</h4>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Critères de notation</label>
      <div class="col-sm-10">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Désignation</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach(NotationCriteria::roomsNotationCriterias() as $index => $criteria)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $criteria->criteria_value }}</td>
                <td>#</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="#" class="newRoomsNotationCriteriaAction" style="float: right;">Ajouter</a>
        </div>
      </div>
    </div>
    <form action="{{ route('admin.SystemConfig.save') }}" method="post">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Préfix</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('rmn_prefix') }}" name="rmn_prefix">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Positions</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('rmn_positions') }}" name="rmn_positions">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Format</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('rmn_ref_format') }}" name="rmn_ref_format">
        </div>
        <button style="float: right;" type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>

    <!--  laundry Notation section  -->
    <hr>
    <h4>Control de Blanchisserie</h4>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Critères de notation</label>
      <div class="col-sm-10">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Désignation</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach(NotationCriteria::laundryNotationCriterias() as $index => $criteria)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $criteria->criteria_value }}</td>
                <td>#</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="#" class="newLaundryNotationCriteriaAction" style="float: right;">Ajouter</a>
        </div>
      </div>
    </div>
    <form action="{{ route('admin.SystemConfig.save') }}" method="post">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Préfix</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('lun_prefix') }}" name="lun_prefix">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Positions</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('lun_positions') }}" name="lun_positions">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Format</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('lun_ref_format') }}" name="lun_ref_format">
        </div>
        <button style="float: right;" type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>

    <hr>
    <h4>Control de Bureaux et locaux</h4>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Critères de notation</label>
      <div class="col-sm-10">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Désignation</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach(NotationCriteria::officeNotationCriterias() as $index => $criteria)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $criteria->criteria_value }}</td>
                <td>#</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="#" class="newOfficeNotationCriteriaAction" style="float: right;">Ajouter</a>
        </div>
      </div>
    </div>
    <form action="{{ route('admin.SystemConfig.save') }}" method="post">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Préfix</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('ofc_prefix') }}" name="ofc_prefix">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Positions</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('ofc_positions') }}" name="ofc_positions">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Format</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ SystemConfig::config('ofc_ref_format') }}" name="ofc_ref_format">
        </div>
        <button style="float: right;" type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>
  </div>
</div>
