@extends('layout.main_layout')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            @include('supported.partials.pageTitle')
            @include('supported.partials.beadcrumbs')
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Nouvelle Prise en charge</h5>
                        </div>
                        <div class="card-block">
                            <form method="POST" action="{{route('admin.support.store')}}" >
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Motif de la demande</label>
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
                                            <label class="col-sm-2 col-form-label">Prestation demandé</label>
                                            <div class="col-md-10">
                                                <table class="table table-bordered table-hover" id="tab_logic">
                                                    <tbody>
                                                    <tr id='addr0'>
                                                        <td>1</td>
                                                        <td>
                                                            @if($type == "standard")
                                                            <select name="prestation[]" class="form-control">
                                                                <option value="">Demander votre produit</option>
                                                                @foreach(Product::all() as $product)
                                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                                @endforeach
                                                            </select>
                                                                @else
                                                            <input type="text" name='prestation[]'  placeholder='Prestation demandé' class="form-control"/>
                                                            </td>
                                                        @endif
                                                        <td id="td2"><input type="text" name='quantity[]'  placeholder='Quantity' class="form-control"/></td>
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

