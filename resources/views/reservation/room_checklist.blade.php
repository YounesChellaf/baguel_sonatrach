@extends('layout.main_layout')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            @include('reservation.partials.pageTitle')
            @include('reservation.partials.beadcrumbs')
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cocher les equipements présents dans la chambre</h5>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('admin.reservation.create.post') }}" method="post">
                                @csrf
                                @foreach($instances as $instance)
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputState">{{$instance->equipement->type}} ==>  {{$instance->equipement->marque}} ({{$instance->status}})</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="checkbox" name="presence[]" id="">
                                    </div>
                                </div>
                                @endforeach
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
