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
                            <h5>Nouvelle visite inopiné</h5>
                        </div>
                        <div class="card-block">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> Il y avait quelques problèmes lors la création du nouvelle visite.
                                    <br>
                                    <ul class="t7wissa-errors-list">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{route('admin.visit.store')}}" >
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
                                            <option value="">Choose...</option>
                                            @foreach(User::all() as $employee)
                                                <option value="{{$employee->id}}">{{$employee->firstName}} {{$employee->first_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Liste des visiteurs</label>
                                    <div class="col-md-10">
                                        <table class="table table-bordered table-hover" id="tab_logic">
                                            <tbody>
                                            <tr id='addr0'>
                                                <td>1</td>
                                                <td id="td1"><input type="text" name='last_name[]'  placeholder='Nom' class="form-control"/></td>
                                                <td id="td2"><input type="text" name='first_name[]'  placeholder='Prenom' class="form-control"/></td>
                                                <td id="td3"><input type="text" name='identity_card_number[]'  placeholder='Numero carte identité' class="form-control"/></td>
                                                <td id="td4"><input type="text" name='function[]' placeholder='Fonction' class="form-control"/></td>
                                            </tr>
                                            <tr id="addr1"></tr>
                                            </tbody>
                                        </table>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <a id="add_row" class="btn btn-primary pull-left">Ajouter autre employée</a>
                                                <a id='delete_row' class="btn btn-danger pull-right" style="margin-left: 50%">Supprimer ligne</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Reason de visite</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="reason"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Remarques</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="remark"></textarea>
                                    </div>
                                </div>
                                <input name="nb" type="hidden" value="">
                                <input name="type" type="hidden" value="unplanned_visit">
                                <button id="submit-btn" type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('extraJs')
            <script>
                $(document).ready(function(){
                    var i=1;
                    $("input[name=nb]:hidden").val(i);
                    $("#add_row").click(function(){b=i-1;
                        $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
                        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
                        i++;
                        $("input[name=nb]:hidden").val(i);
                    });
                    $("#delete_row").click(function(){
                        if(i>1){
                            $("#addr"+(i-1)).html('');
                            i--;
                            $("input[name=nb]:hidden").val(i);
                        }
                    });
                });
            </script>
@endsection

