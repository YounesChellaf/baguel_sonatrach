@extends('layout.main_layout')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            @include('programmed_visit.partials.pageTitle')
            @include('programmed_visit.partials.beadcrumbs')
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Nouvelle visite</h5>
                        </div>
                        <div class="card-block">
                            <form method="Post" action="/admin/visit/create" >
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nom sociéte</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="supplierName" name="company_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Date d'entrée</label>
                                    <div class="col-sm-10">
                                        <input type="date" id="supplierDisplayName" class="form-control" name="in_date" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Date de sortie</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="out_date" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Employée concernée</label>
                                    <div class="col-sm-10">
                                        <select name="concerned_id" class="form-control">
                                            @foreach(Employee::all() as $employee)
                                            <option value=""></option>
                                            <option value="{{$employee->id}}">{{$employee->last_name}} {{$employee->first_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Visiteur</label>
                                    <div class="col-sm-10">
                                        <select name="visitor_id" class="form-control">
                                            <option value=""></option>
                                            @foreach(Visitor::all() as $visitor)
                                                <option value="{{$visitor->id}}">{{$visitor->last_name}} {{$visitor->first_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Reason de visite</label>
                                    <div class="col-sm-10">
                                        <select name="reason" class="form-control">
                                            <option value=""></option>
                                            <option value="reason 1">reason 1</option>
                                            <option value="reason 2">reason 2</option>
                                            <option value="reason 3">reason 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Remarques</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="remark"></textarea>
                                    </div>
                                </div>
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
