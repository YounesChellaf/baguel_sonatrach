@extends('supported.AddSupport')
@section('content-form')
    <form method="POST" action="{{route('admin.support.store')}}" >
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Organisme d'acceuil</label>
            <div class="col-sm-10">
                <input type="text" id="supplierName" name="organism" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Motif de la demande</label>
            <div class="col-sm-10">
                <input type="text" id="supplierName" name="motif_support" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nombre de repas</label>
            <div class="col-sm-10">
                <input type="text" id="supplierName" name="motif_support" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Période du préstation :</label>
            <div class="col-sm-5">
                <input type="date" id="supplierDisplayName" class="form-control" name="support_date_from" placeholder="">
            </div>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="support_date_to" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Imputation</label>
            <div class="col-sm-10">
                <select id="inputState" name="imputation" class="form-control">
                    <option value="" selected>Choose...</option>
                    @foreach(Service::all() as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Prestation demandé</label>
            <div class="col-md-10">
                <table class="table table-bordered table-hover" id="tab_logic">
                    <tbody>
                    <tr id='addr0'>
                        <td>1</td>
                        <td>
                            <input type="text" name='name[]'  placeholder='Nom et Prénom ' class="form-control"/>
                        </td>
                        <td id="td2"><input type="text" name='nombre[]'  placeholder='Nombre' class="form-control"/></td>
                        <td id="td3"><input type="text" name='observation[]'  placeholder='Observation' class="form-control"/></td>
                    </tr>
                    <tr id="addr1"></tr>
                    </tbody>
                </table>
                <div class="row clearfix">
                    <div class="col-md-12">
                        <a id="add_row" class="btn btn-primary pull-left">Ajouter autre produit</a>
                        <a id='delete_row' class="btn btn-danger pull-right" style="margin-left: 50%">Supprimer ligne</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Remarques</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="remark"></textarea>
            </div>
        </div>
        <input name="support_type" type="hidden" value="visitor">
        <input name="nb" type="hidden" value="">
        <button id="submit-btn" type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
@section('js-form')
    <script>
        $(document).ready(function(){
            var i=1;
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