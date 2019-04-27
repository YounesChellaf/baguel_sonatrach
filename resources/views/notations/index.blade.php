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
        <div class="row">
          <div class="col-xl-4 col-md-12 singleNotationCategory" data-url = "{{ route('admin.notations.index.type', 'kitchen') }}">
            <div class="card comp-card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="m-b-25">Cuisine</h6>
                    <h3 class="f-w-700 text-c-blue">{{ $kitchenNotationsCount }}</h3>
                    <p class="m-b-0">{{ Notation::lastKitchenControlDate() }}</p>
                  </div>
                  <div class="col-auto">
                    <img width="120" src="{{ asset('frontend/assets/images/notations/kitchen.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 singleNotationCategory" data-url = "{{ route('admin.notations.index.type', 'reception') }}">
            <div class="card comp-card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="m-b-25">Reception marchandise</h6>
                    <h3 class="f-w-700 text-c-blue">{{ $receptionNotationsCount }}</h3>
                    <p class="m-b-0">{{ Notation::lastReceptionControlDate() }}</p>
                  </div>
                  <div class="col-auto">
                    <img width="120" src="{{ asset('frontend/assets/images/notations/distribution.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 singleNotationCategory" data-url = "{{ route('admin.notations.index.type', 'storage') }}">
            <div class="card comp-card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="m-b-25">Magasin & Stockage</h6>
                    <h3 class="f-w-700 text-c-blue">{{ $storageNotationsCount }}</h3>
                    <p class="m-b-0">{{ Notation::lastStorageControlDate() }}</p>
                  </div>
                  <div class="col-auto">
                    <img width="120" src="{{ asset('frontend/assets/images/notations/warehouse.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 singleNotationCategory" data-url = "{{ route('admin.notations.index.type', 'restaurant') }}">
            <div class="card comp-card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="m-b-25">Restaurant & Foyer</h6>
                    <h3 class="f-w-700 text-c-blue">{{ $restaurantNotationsCount }}</h3>
                    <p class="m-b-0">{{ Notation::lastRestaurantControlDate() }}</p>
                  </div>
                  <div class="col-auto">
                    <img width="120" src="{{ asset('frontend/assets/images/notations/food.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 singleNotationCategory" data-url = "{{ route('admin.notations.index.type', 'suppliers') }}">
            <div class="card comp-card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="m-b-25">Fournisseurs</h6>
                    <h3 class="f-w-700 text-c-blue">{{ $supplierNotationsCount }}</h3>
                    <p class="m-b-0">{{ Notation::lastSupplierControlDate() }}</p>
                  </div>
                  <div class="col-auto">
                    <img width="120" src="{{ asset('frontend/assets/images/notations/supplier.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 singleNotationCategory" data-url = "{{ route('admin.notations.index.type', 'rooms') }}">
            <div class="card comp-card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="m-b-25">Chambres</h6>
                    <h3 class="f-w-700 text-c-blue">{{ $roomNotationsCount }}</h3>
                    <p class="m-b-0">{{ Notation::lastRoomControlDate() }}</p>
                  </div>
                  <div class="col-auto">
                    <img width="120" src="{{ asset('frontend/assets/images/notations/room.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 singleNotationCategory" data-url = "{{ route('admin.notations.index.type', 'laundry') }}">
            <div class="card comp-card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="m-b-25">Blanchisserie</h6>
                    <h3 class="f-w-700 text-c-blue">{{ $laundryNotationsCount }}</h3>
                    <p class="m-b-0">{{ Notation::lastLaundryControlDate() }}</p>
                  </div>
                  <div class="col-auto">
                    <img width="120" src="{{ asset('frontend/assets/images/notations/washing-machine.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 singleNotationCategory" data-url = "{{ route('admin.notations.index.type', 'office') }}">
            <div class="card comp-card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="m-b-25">Bureaux</h6>
                    <h3 class="f-w-700 text-c-blue">{{ $officeNotationsCount }}</h3>
                    <p class="m-b-0">{{ Notation::lastOfficeControlDate() }}</p>
                  </div>
                  <div class="col-auto">
                    <img width="120" src="{{ asset('frontend/assets/images/notations/desk.png') }}" alt="">
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
