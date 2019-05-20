@extends('layout.main_layout')
@include('layout.assets.datatable._css')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('room.partials.pageTitle')
    @include('room.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">

      <div class="page-body">
        <div class="row">
          <div class="col-sm-12">

            <div class="card">
              <div class="card-header table-card-header">
                <h5>HTML5 Export Buttons</h5>
                <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-room">Nouvelle chambre</button>
              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="basic-btn" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Numero</th>
                        <th>Bloc</th>
                        <th>Nombre d'équipements</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(Room::all() as $room)
                      <tr>
                        <td>{{$room->number}}</td>
                        <td>{{$room->bloc->name}}</td>
                        <td>{{$room->instance->count()}}</td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#modal-update-{{$room->id}}">modifier</button></td>
                        <td><button class="btn btn-pink" data-toggle="modal" data-target="#modal-delete-{{$room->id}}">Supprimer</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<div id="styleSelector">
</div>
<div class="col-md-4 col-sm-12">
  <div id="modal-add-room" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ajouter une chambre</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="post" class="room-add" action="/admin/room">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="control-label">Numero de chmabre</label>
              <input type="text" class="form-control" id="recipient-name" name="nombre">
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <select name="bloc_id" class="form-control">
                  <option value="">Choisir un bloc</option>
                  @foreach(Bloc::all() as $bloc)
                  <option value="{{$bloc->id}}">{{$bloc->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Liste des equipements</label>
              <div class="col-md-12">
                <table class="table table-bordered table-hover" id="tab_logic">
                  <tbody>
                  <tr id='addr0'>
                    <td>1</td>
                    <td><input type="text" name='reference[]'  placeholder='Réference' class="form-control"/></td>
                    <td><input type="number" name='number[]'  placeholder='Nombre' class="form-control"/></td>
                    <td>
                      <select name="equipement_id[]" class="form-control">
                        <option value="">Choisir un type d'equipement</option>
                        @foreach(Equipement::all() as $equipement)
                          <option value="{{$equipement->id}}">{{$equipement->type}} : {{$equipement->marque}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <select name="status[]" class="form-control">
                        <option value="new">Nouveau</option>
                        <option value="used">Utilisé</option>
                      </select>
                    </td>
                    <input type="hidden" name="nb" value="">
                  </tr>
                  <tr id='addr1'></tr>
                  </tbody>
                </table>
                <div class="row clearfix">
                  <div class="col-md-12">
                    <a id="add_row" class="btn btn-primary pull-left">Ajouter equipement</a>
                    <a id='delete_row' class="btn btn-danger pull-right">Supprimer ligne</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-round btn-outline-danger waves-effect" data-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-round btn-outline-success waves-effect waves-light">Ajouter</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@foreach(Room::all() as $room)
<div class="col-md-4">
  <div id="modal-update-{{$room->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modifier la chambre</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="post" class="room-add" action="/admin/room/{{$room->id}}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="recipient-name" class="control-label">Numero de chambre</label>
              <input type="text" class="form-control" id="recipient-name" name="nombre" value="{{$room->number}}">
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <select name="bloc_id" class="form-control">
                  <option value="{{$room->bloc->id}}">{{$room->bloc->name}}</option>
                  @foreach(Bloc::all() as $bloc)
                  <option value="{{$bloc->id}}">{{$bloc->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Liste des equipements</label>
              <div class="col-md-12">
                <table class="table table-bordered table-hover">
                  <tbody>
                  @foreach($room->instance as $instance)
                  <tr>
                    <td><input type="text" name='reference[]'  value="{{$instance->reference}}" class="form-control"/></td>
                    <td><input type="number" name='number[]'  value="{{$instance->number}}" class="form-control"/></td>
                    <td>
                      <select name="equipement_id[]" class="form-control">
                        <option value="{{$instance->equipement_id}}">Choisir un type d'equipement</option>
                        @foreach(Equipement::all() as $equipement)
                          <option value="{{$equipement->id}}">{{$equipement->type}} : {{$equipement->marque}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <select name="status[]" class="form-control">
                        <option value="{{$instance->status}}">{{$instance->status}}</option>
                        <option value="new">Nouveau</option>
                        <option value="used">Utilisé</option>
                      </select>
                    </td>
                    <input type="hidden" name="nb" value="">
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <table class="table table-bordered table-hover" id="tab_logic1">
                  <tbody>
                  <tr id='add0'>
                    <td>1</td>
                    <td><input type="text" name='reference[]'  placeholder='Réference' class="form-control"/></td>
                    <td><input type="number" name='number[]'  placeholder='Nombre' class="form-control"/></td>
                    <td>
                      <select name="equipement_id[]" class="form-control">
                        <option value="">Choisir un type d'equipement</option>
                        @foreach(Equipement::all() as $equipement)
                          <option value="{{$equipement->id}}">{{$equipement->type}} : {{$equipement->marque}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <select name="status[]" class="form-control">
                        <option value="new">Nouveau</option>
                        <option value="used">Utilisé</option>
                      </select>
                    </td>
                    <input type="hidden" name="nb" value="">
                  </tr>
                  <tr id='add1'></tr>
                  </tbody>
                </table>
                <div class="row clearfix">
                  <div class="col-md-12">
                    <a id="add_row1" class="btn btn-primary pull-left">Ajouter equipement</a>
                    <a id='delete_row1' class="btn btn-danger pull-right">Supprimer ligne</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-round btn-outline-danger waves-effect" data-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-round btn-outline-success waves-effect waves-light">Enregistrer</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-delete-{{$room->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alerte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez vous supprimer ce bureau !
      </div>
      <div class="modal-footer">
        <form method="POST" action="/admin/room/{{$room->id}}">
          @csrf
          <input type="hidden">
          @method('delete')
          <button type="submit" class="btn btn-round btn-outline-danger">Confirmer</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@include('layout.assets.datatable._js')
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
          i= $('#tab_logic1').children().length;
          $("#add_row1").click(function(){b=i-1;
              alert(i);
              $('#add'+i).html($('#add'+b).html()).find('td:first-child').html(i+1);
              $('#tab_logic1').append('<tr id="add'+(i+1)+'"></tr>');
              i++;
              $("input[name=nb]:hidden").val(i);
          });
          $("#delete_row1").click(function(){
              if(i>1){
                  $("#add"+(i-1)).html('');
                  i--;
                  $("input[name=nb]:hidden").val(i);
              }
          });
      });
  </script>
@endsection
