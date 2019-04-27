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
        <div class="row">
          <div class="col-xl-4 col-md-12 singleNotationCategory" data-url = "{{ route('admin.notations.index.type', 'kitchen') }}">
            <div class="card comp-card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="m-b-25">Cuisine</h6>
                    <h3 class="f-w-700 text-c-blue">1,563</h3>
                    <p class="m-b-0">May 23 - June 01 (2017)</p>
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
                    <h3 class="f-w-700 text-c-blue">30,564</h3>
                    <p class="m-b-0">May 23 - June 01 (2017)</p>
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
                    <h3 class="f-w-700 text-c-blue">42.6%</h3>
                    <p class="m-b-0">May 23 - June 01 (2017)</p>
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
                    <h3 class="f-w-700 text-c-blue">42.6%</h3>
                    <p class="m-b-0">May 23 - June 01 (2017)</p>
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
                    <h3 class="f-w-700 text-c-blue">42.6%</h3>
                    <p class="m-b-0">May 23 - June 01 (2017)</p>
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
                    <h3 class="f-w-700 text-c-blue">42.6%</h3>
                    <p class="m-b-0">May 23 - June 01 (2017)</p>
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
                    <h3 class="f-w-700 text-c-blue">42.6%</h3>
                    <p class="m-b-0">May 23 - June 01 (2017)</p>
                  </div>
                  <div class="col-auto">
                    <img width="120" src="{{ asset('frontend/assets/images/notations/washing-machine.png') }}" alt="">
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
