@extends('layout.main_layout')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('notations.categories.kitchen.partials.pageTitle')
    @include('notations.categories.kitchen.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        @include('notations.partials.actions')
        <div class="card">
          <div class="card-header">
            <h5>{{ $notation->ref }}</h5>
          </div>
          <div class="card-block">
            <div class="row">
              <div class="col-md-4">
                <h4>Date :</h4> <p>{{ $notation->controlDate() }}</p>
              </div>
              <div class="col-md-4">
                <h4>Effectué par:</h4>
                <p>{{ $notation->CreatedBy->name() }}</p>
              </div>
              <div class="col-md-4">
                <h4>Type</h4>
                <p>{{ $notation->type() }}</p>
              </div>
            </div>
            <br>
            <div class="row m-b-30">
              <div class="col-lg-12 col-xl-12">
                <ul class="nav nav-tabs md-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#activitiesLog" role="tab" aria-selected="true">Résultat</a>
                    <div class="slide"></div>
                  </li>
                </ul>

                <div class="tab-content card-block">
                  <div class="tab-pane active show" id="activitiesLog" role="tabpanel">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Critère</th>
                            <th>Note</th>
                            <th>Commentaire</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($notation->scoresDisplay() as $index => $score)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $score['criteria_name'] }}</td>
                            <td>{{ $score['criteria_note'] }} /10</td>
                            <td>{{ Notation::comment($score['criteria_comment']) }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <h6>Commentaires:</h6>
                      <p>{{ $notation->comments }}</p>
                    </div>
                    <div class="col-md-6">
                      <h5 style="float: right;">Note totale: {{ $notation->total_score }} /10</h5> <br>
                      <img src="{{ $notation->reaction() }}" width="40" style="float: right">
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
</div>
@endsection
