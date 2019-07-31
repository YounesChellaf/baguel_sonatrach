@extends('layout.main_layout')
@include('layout.assets.datatable._css')
@section('extraCss')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('cleaning_order.partials.pageTitle')
    @include('cleaning_order.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">

      <div class="page-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card product-progress-card">
              <div class="card-block">
                <div class="row pp-main">
                  <div class="col-xl-3 col-md-6">
                    <div class="pp-cont">
                      <div class="row align-items-center m-b-20">
                        <div class="col-auto">
                          <i class="fas fa-bed f-24 text-mute"></i>
                        </div>
                        <div class="col text-right">
                          <h2 class="m-b-0 text-c-green">435</h2>
                        </div>
                      </div>
                      <div class="row align-items-center m-b-15">
                        <div class="col-auto">
                          <p class="m-b-0">Chambres libre</p>
                        </div>
                        <div class="col text-right">
                          <p class="m-b-0 text-c-green">45%</p>
                        </div>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-c-green" style="width:45%"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                    <div class="pp-cont">
                      <div class="row align-items-center m-b-20">
                        <div class="col-auto">
                          <i class="fas fa-bed f-24 text-mute"></i>
                        </div>
                        <div class="col text-right">
                          <h2 class="m-b-0 text-c-green">435</h2>
                        </div>
                      </div>
                      <div class="row align-items-center m-b-15">
                        <div class="col-auto">
                          <p class="m-b-0">Chambres libre</p>
                        </div>
                        <div class="col text-right">
                          <p class="m-b-0 text-c-green">45%</p>
                        </div>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-c-green" style="width:45%"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                    <div class="pp-cont">
                      <div class="row align-items-center m-b-20">
                        <div class="col-auto">
                          <i class="fas fa-bed f-24 text-mute"></i>
                        </div>
                        <div class="col text-right">
                          <h2 class="m-b-0 text-c-green">435</h2>
                        </div>
                      </div>
                      <div class="row align-items-center m-b-15">
                        <div class="col-auto">
                          <p class="m-b-0">Chambres libre</p>
                        </div>
                        <div class="col text-right">
                          <p class="m-b-0 text-c-green">45%</p>
                        </div>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-c-green" style="width:45%"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                    <div class="pp-cont">
                      <div class="row align-items-center m-b-20">
                        <div class="col-auto">
                          <i class="fas fa-bed f-24 text-mute"></i>
                        </div>
                        <div class="col text-right">
                          <h2 class="m-b-0 text-c-green">435</h2>
                        </div>
                      </div>
                      <div class="row align-items-center m-b-15">
                        <div class="col-auto">
                          <p class="m-b-0">Chambres libre</p>
                        </div>
                        <div class="col text-right">
                          <p class="m-b-0 text-c-green">45%</p>
                        </div>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-c-green" style="width:45%"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header table-card-header">
                <h5>HTML5 Export Buttons</h5>
                <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-cleaning-order">Nouveau ordre</button>
              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="usersTable" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Site de nettoyage </th>
                        <th>Superviseur de tache</th>
                        <th>Degree d'urgence</th>
                        <th>Date limit</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(CleaningOrder::all() as $order)
                      <tr>
                        @if($order->site_type == 'room')
                          <td>La chambre {{Room::find($order->site_id)->number}}</td>
                        @else
                          <td>Le bureau {{Office::find($order->site_id)->number}}</td>
                        @endif
                        <td>{{User::find($order->supervisor_id)->lastName}} {{User::find($order->supervisor_id)->firstName}}</td>
                        <td>{{$order->degree()}}</td>
                        <td>{{$order->limit_date->format('Y-m-d')}}</td>
                        <td>{{$order->status()}} {{$order->isLate()}}</td>
                        <td>
                          <div class="dropdown-info dropdown open">
                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Actions</button>
                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                              <a class="dropdown-item" href="{{route('admin.cleaning_order.details',$order->id)}}">Consulter</a>
                              <a class="dropdown-item" href="{{route('admin.cleaning_order.approuve',$order->id)}}">Valider</a>
                              <a class="dropdown-item"  href="{{route('admin.cleaning_order.reject',$order->id)}}">Rejeter</a>
                              <a class="dropdown-item" data-toggle="modal" data-target="#modal-affect-employee">Affecter les employée</a>
                              <a class="dropdown-item" href="{{route('admin.cleaning_order.done',$order->id)}}">Marquer comme fait</a>
                            </div>
                          </div>
                        </td>
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
  <div id="modal-add-cleaning-order" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un ordre de nottoyage</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form class="cleaning-order-add" method="post"  action="{{route('cleaning_order.store')}}">
            @csrf
            <div class="form-group row">
              <div class="col-sm-12">
                <label for="recipient-name" class="control-label">Type d'emplacement</label>
                <select id="type_site" name="site_type" class="form-control">
                  <option value="">Choose...</option>
                  <option value="1">Chambre</option>
                  <option value="2">Bureau</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div id="room_list" class="col-sm-12">
                <label for="recipient-name" class="control-label">Liste des chambres</label>
                <select name="room_id" class="form-control">
                  <option value="">Choose...</option>
                  @foreach(Room::all() as $room)
                  <option value="{{$room->id}}">{{$room->number}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div id="office_list" class="form-group row">
              <div class="col-sm-12">
                <label for="recipient-name" class="control-label">Liste des bureaux</label>
                <select name="office_id" class="form-control">
                  <option value="">Choose...</option>
                  @foreach(Office::all() as $office)
                  <option value="{{$office->id}}">{{$office->number}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label for="recipient-name" class="control-label">Superviseur de tache</label>
                <select name="supervisor_id" class="form-control">
                  <option value="">Choose...</option>
                  @foreach(User::all() as $user)
                  <option value="{{$user->id}}">{{$user->lastName}} {{$user->firstName}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Date limite</label>
              <input type="date" class="form-control" id="recipient-name" name="limit_date">
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label for="recipient-name" class="control-label">Degrée d'urgence</label>
                <select name="degree" class="form-control">
                  <option value="">Choose...</option>
                  <option value="0">Non urgent</option>
                  <option value="1">urgent</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Remarques</label>
              <textarea type="text" class="form-control" id="recipient-name" name="remark"></textarea>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@foreach(CleaningOrder::all() as $order)
<div class="modal fade" id="modal-delete-employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alerte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez vous supprimer cet ordre de nettoyage !
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{route('cleaning_order.destroy',$order->id)}}">
          @csrf
          <input type="hidden">
          @method('delete')
          <button type="submit" class="btn btn-danger">Confirmer</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div id="modal-affect-employee" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Affecter un employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="post" class="service-add" action="{{route('admin.cleaning_order.affect',$order->id)}}">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="control-label">Liste des employées á affecter</label>
              <div class="col-md-12">
                <table class="table table-bordered table-hover" id="tab_logic">
                  <tbody>
                  <tr id='addr0'>
                    <td>1</td>
                    <td>
                      <select name="employee_id[]" class="form-control">
                        <option value="">Choisir un type d'equipement</option>
                        @foreach(Employee::all() as $employee)
                          <option value="{{$employee->id}}">{{$employee->last_name}}  {{$employee->first_name}}</option>
                        @endforeach
                      </select>
                    </td>
                    <input type="hidden" name="nb" value="">
                  </tr>
                  <tr id='addr1'></tr>
                  </tbody>
                </table>
                <div class="row clearfix">
                  <div class="col-md-12">
                    <a id="add_row" class="btn btn-primary pull-left">Ajouter employée</a>
                    <a id='delete_row' class="btn btn-danger pull-right">Annuler employee</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary waves-effect waves-light">Affecter</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@endforeach
@include('layout.assets.datatable._js')
@endsection
@section('extraJs')
  <script src="{{ asset('frontend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('frontend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/pages/data-table/js/data-table-custom.js') }}"></script>
  <script src="{{ asset('frontend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('frontend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
  <script>
      $(document).ready(function(){
          $('#room_list').hide();
          $('#office_list').hide();
          $('#type_site').change(function () {
              var selectedVal = $(this).find(':selected').val();
              if (selectedVal == 1){
                  $('#office_list').hide();
                  $('#room_list').show();
              }
              if (selectedVal == 2) {
                  $('#room_list').hide();
                   $('#office_list').show();
              }
          });
      });
  </script>
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
