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
                            <form method="POST" action="/admin/visit/create" >
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
                                            <label class="col-sm-2 col-form-label">Liste des employées</label>
                                            <div class="col-md-10">
                                                <table class="table table-bordered table-hover" id="tab_logic">
                                                    <tbody>
                                                    <tr id='addr0'>
                                                        <td id="td1"><input type="text" name='last_name0'  placeholder='Nom' class="form-control"/></td>
                                                        <td id="td2"><input type="text" name='first_name0'  placeholder='Prenom' class="form-control"/></td>
                                                        <td id="td3"><input type="text" name='identity_card_number0'  placeholder='Numero carte identité' class="form-control"/></td>
                                                        <td id="td4"><input type="text" name='function0' placeholder='Fonction' class="form-control"/></td>
                                                    </tr>
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
                                <input name="nb" type="hidden" value="">
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
    $("#add_row").click(function(){b=i-1;
    //$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);

    $('#tab_logic').append('<tr id="addr'+(i+1)+'">' +
        '<td><input name="last_name'+(i)+'" placeholder="Nom" class="form-control"></td>' +
        '<td><input name="first_name'+(i)+'" placeholder="Prenom" class="form-control"></td>' +
        '<td><input name="identity_card_number'+(i)+'" placeholder="Numero carte identité" class="form-control"></td>' +
        '<td><input name="function'+(i)+'" placeholder="Fonction" class="form-control"></td>' +
        '</tr>');

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

