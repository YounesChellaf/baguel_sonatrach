@extends('layout.main_layout')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('notations.partials.pageTitle')
    @include('notations.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>Nouveau Contrôl de reception de marchandises</h5>
          </div>
          <div class="card-block">
            @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong> Il y avait quelques problèmes lors la création du nouveau compte.
              <br>
              <ul class="t7wissa-errors-list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="post" action="{{ route('admin.notations.type.save', 'reception') }}">
              @csrf
              <div class="row">
                <div class="col-sm-12 col-xl-6 m-b-30">
                  <p>Date de contrôl</p>
                  <input class="form-control" name="controlDate" type="date" value="{{ date('Y-m-d') }}" />
                </div>
                <div class="col-sm-12 col-xl-6">
                  <p>Heure de contrôl</p>
                  <input class="form-control" name="controlTime" type="time" value="{{ date('h:m:s') }}"/>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-xl-6 m-b-30">
                  <p>Prestataire</p>
                  <select class="form-control supplierSelect" name="supplier">
                    <option value="">Prestataire</option>
                    @foreach($suppliers as $index => $supplier)
                      <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-12 col-xl-6">
                  <p>Fournisseur</p>
                  <select class="form-control subSuppliers" name="Subsupplier">
                    <option value="">Fournisseur</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-xl-6 m-b-30">
                  <p>Nature du produit</p>
                  <input class="form-control" name="productNature" type="text"/>
                </div>
                <div class="col-sm-12 col-xl-6">
                  <p>N° Facture ou BL</p>
                  <input class="form-control" name="originDocument" type="text" required/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <p>Critère</p>
                </div>
                <div class="col-md-3">
                  <p>Décision</p>
                </div>
                <div class="col-md-3">
                  <p>Score</p>
                </div>
                <div class="col-md-3">
                  <p>Commentaire</p>
                </div>
              </div>
              @foreach(NotationCriteria::deliveryNoationCriterias() as $index => $criteria)
              <div class="row">
                <div class="col-sm-3">
                  {{ $criteria->display_name }}
                </div>
                <div class="col-md-3">
                  <select class="form-control" name="decision-{{ $criteria->id }}">
                    <option value="yes">Oui</option>
                    <option value="no">Non</option>
                  </select>
                </div>
                <div class="col-md-3 rating">
                  <div class="stars stars-example-fontawesome-o">
                    <select class="singleControlRating" name="rating-{{ $criteria->id }}" data-current-rating="5" autocomplete="off">
                      <option value="" label="0"></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <select class="form-control" name="rating-comment-option-{{ $criteria->id }}">
                    <option value="0" selected>Commentaire</option>
                    <option value="option-1">Option 1</option>
                    <option value="option-2">Option 2</option>
                    <option value="option-3">Option 3</option>
                    <option value="option-4">Option 4</option>
                    <option value="option-5">Option 5</option>
                    <option value="option-6">Option 6</option>
                    <option value="option-7">Option 7</option>
                    <option value="option-8">Option 8</option>
                    <option value="option-9">Option 9</option>
                    <option value="option-10">Option 10</option>
                    <option value="option-11">Option 11</option>
                    <option value="option-12">Option 12</option>
                  </select>
                </div>
              </div>
              @endforeach
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Commentaires</label>
                <div class="col-sm-10">
                  <textarea name="comments" rows="8" class="form-control" cols="80"></textarea>
                </div>
              </div>
              <input type="hidden" name="controlType" value="reception">
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
@endsection
