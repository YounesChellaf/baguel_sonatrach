import {route} from './helpers.js';
import swal from 'sweetalert';
import {showBodyLoader} from './helpers.js';
import {hideBodyLoader} from './helpers.js';
$(document).ready(function(){
  function initUsersDataTable(){
    let usersTable = $("#usersTable");
    if(usersTable.length > 0){
      $("#usersTable").DataTable();
    }
  }

  function _computeCompanySwitchModal(){

  }

  $(".switchSystem").on('click', function(){
    $("#fullHeightModalRight").modal('show');
  });

  $(".switchDataSource").on('click', function(e){
    e.preventDefault();
    var dataSource = $(this).data('type');
    let confirmMessage = '';
    let sourceName = '';
    let sourceId = null;
    switch (dataSource) {
      case 'lifebase':
      sourceName = $(this).data('lifebase');
      sourceId = $(this).data('lbid');
      confirmMessage = "Vous allez changer la source de données vers la base de vie: "+sourceName;
      break;

      case 'administration':
      sourceName = $(this).data('admin');
      sourceId = $(this).data('adminid');
      confirmMessage = "Vous allez changer la source de données vers l'administration: "+sourceName;
      break;
      default:
      alert('Unknown source');
    }

    swal({
      title: "Êtes vous sur ?",
      text: confirmMessage,
      icon: "info",
      buttons: true,
      dangerMode: false,
      buttons: ['Non', 'Oui, changer'],
    })
    .then((willSwitch) => {
      if (willSwitch) {
        $.ajax({
          url: route('admin.system.switchDataSource'),
          method: 'GET',
          data: {
            dataSource: dataSource,
            sourceId: sourceId,
          },
          success: function(result){
            result = $.parseJSON(result);
            switch (result) {
              case 'switched':
              swal('DONE');
              break;
              default:

            }
          },
        })
      } else {
        return false;
      }
    });
  });

  /////////// Init User database //////////
  initUsersDataTable();
  /////////////////////////////////////////

  /////////// Handle user CRUD actions //////////
  function computeUserName(){
    $("#username").val('');
    var username = '';
    var firstName = $("#firstName").val();
    var lastName = $("#lastName").val();
    if(firstName && lastName){
      username = lastName+'.'+firstName;
    }
    $("#username").val(username);
  }
  $(".administrationOptions").hide();
  $(".lifeBaseOptions").hide();
  $(".userAccountStructure").on('change', function(){
    var selectedOption = $(this).val();
    switch (selectedOption) {
      case 'lifebase':
      $(".administrationOptions").hide();
      $(".lifeBaseOptions").show();
      break;

      case 'administration':
      $(".administrationOptions").show();
      $(".lifeBaseOptions").hide();
      break;
      default:

    }
  });

  function generateSecuredPassword(){
    $.ajax({
      url: route('admin.users.create.getSecuredPassword'),
      method: 'GET',
      success: function(result){
        result = $.parseJSON(result);
        $("#password").val(result);
      },
    })
  }

  $(".NewUserForm #firstName").on('change', function(){
    computeUserName();
  });

  $(".NewUserForm #lastName").on('change', function(){
    computeUserName();
  });

  $(".generateSecuredPassword").on('click', function(){
    generateSecuredPassword();
  });

  $(".removeUser").on('click', function(e){
    e.preventDefault();
    let userId = $(this).data('user-id');
    let userNameDeleted = $(this).data('user-name');
    swal({
      title: "Êtes-vous sûr?",
      text: "Êtes-vous sûr que vous voulez supprimer "+userNameDeleted+"?, veuillez notez qu'une fois supprimé, toutes les opérations qu'il a éffectuer seront aussi supprimé",
      icon: "error",
      buttons: true,
      buttons: ["Non", "Oui, Supprimer"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal({
          title: "Confirmer l'action",
          text: "Pour des raisons de sécurité, nous vous invitons a introduire votre mot de passe",
          icon: "error",
          buttons: true,
          content: {
            element: "input",
            attributes: {
              placeholder: "",
              type: "password",
              required: true,
              name: "userPassword",
            },
          },
          buttons: ["Annuler", "Confirmer"],
          dangerMode: true,
        }).then((value) => {
          if(!value){
            return false;
          }else{
            showBodyLoader();
            $.ajax({
              url: route('admin.users.delete'),
              method: 'POST',
              data: {
                _token: $("meta[name=csrf-token]").attr('content'),
                userId: userId,
                userPassword: value,
              },
              success: function(result){
                var response = $.parseJSON(result);
                hideBodyLoader();
                switch (response.status) {
                  case 404:
                  swal ("Oops" ,response.msg,"warning" );
                  break;

                  case 500:
                  swal ("Oops" ,response.msg,"error" );
                  break;
                  case 200:
                  swal ("Félicitations" ,response.msg,"success" );
                  break;
                  default:

                }
              }
            });
          }
        });
      } else {
        return false
      }
    });
  });
  ///////////////////////////////////////////////////

  /////////// Handle supplier CRUD actions //////////

  $("#supplierName").on('keyup', function(){
    $("#supplierDisplayName").val($("#supplierName").val());
  });

  $(".removeSupplier").on('click', function(e){
    e.preventDefault();
    let supplierId = $(this).data('supplier-id');
    let supplierNameDeleted = $(this).data('supplier-name');
    swal({
      title: "Êtes-vous sûr?",
      text: "Êtes-vous sûr que vous voulez supprimer le fournisseur: "+supplierNameDeleted+" ?",
      icon: "error",
      buttons: true,
      buttons: ["Non", "Oui, Supprimer"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal({
          title: "Confirmer l'action",
          text: "Pour des raisons de sécurité, nous vous invitons a introduire votre mot de passe",
          icon: "error",
          buttons: true,
          content: {
            element: "input",
            attributes: {
              placeholder: "",
              type: "password",
              required: true,
              name: "userPassword",
            },
          },
          buttons: ["Annuler", "Confirmer"],
          dangerMode: true,
        }).then((value) => {
          if(!value){
            return false;
          }else{
            showBodyLoader();
            $.ajax({
              url: route('admin.suppliers.delete'),
              method: 'POST',
              data: {
                _token: $("meta[name=csrf-token]").attr('content'),
                supplierId: supplierId,
                userPassword: value,
              },
              success: function(result){
                var response = $.parseJSON(result);
                hideBodyLoader();
                switch (response.status) {
                  case 404:
                  swal ("Oops" ,response.msg,"warning" );
                  break;

                  case 500:
                  swal ("Oops" ,response.msg,"error" );
                  break;
                  case 200:
                  swal ("Félicitations" ,response.msg,"success" );
                  setTimeout(function(){
                    window.location.reload(1);
                  }, 2000);
                  break;
                  default:

                }
              }
            });
          }
        });
      } else {
        return false
      }
    });
  });


  /////////// Handle Exit permissions operations //////////
  $(".approveExitPermission").on('click', function(e){
    e.preventDefault();
    let exitPermissionRef = $(this).data('ref');
    swal({
      title: "Êtes-vous sûr?",
      text: "Êtes-vous sûr que vous voulez confirmer le bon de sortie "+ exitPermissionRef +"?",
      icon: "info",
      buttons: true,
      buttons: ["Non", "Oui, Approuver"],
      dangerMode: false,
    })
    .then((willApprove) => {
      if (willApprove) {
        swal({
          title: "Confirmer l'action",
          text: "Pour des raisons de sécurité, nous vous invitons a introduire votre mot de passe",
          icon: "warning",
          buttons: true,
          content: {
            element: "input",
            attributes: {
              placeholder: "",
              type: "password",
              required: true,
              name: "userPassword",
            },
          },
          buttons: ["Annuler", "Approuver"],
          dangerMode: true,
        }).then((value) => {
          if(!value){
            return false;
          }else{
            showBodyLoader();
            $.ajax({
              url: route('admin.ExitPermission.approve'),
              method: 'POST',
              data: {
                _token: $("meta[name=csrf-token]").attr('content'),
                permissionRef: exitPermissionRef,
                userPassword: value,
              },
              success: function(result){
                var response = $.parseJSON(result);
                hideBodyLoader();
                switch (response.status) {
                  case 404:
                  swal ("Oops" ,response.msg,"warning" );
                  break;

                  case 500:
                  swal ("Oops" ,response.msg,"error" );
                  break;
                  case 200:
                  swal ("Félicitations" ,response.msg,"success" );
                  setTimeout(function(){
                    window.location.reload(1);
                  }, 2000);
                  break;
                  default:

                }
              }
            });
          }
        });
      } else {
        return false
      }
    });
  });

  $(".rejectExitPermission").on('click', function(e){
    e.preventDefault();
    let exitPermissionRef = $(this).data('ref');
    swal({
      title: "Êtes-vous sûr?",
      text: "Êtes-vous sûr que vous voulez rejeté le bon de sortie "+ exitPermissionRef +"?",
      icon: "error",
      buttons: true,
      buttons: ["Non", "Oui, Rejeter"],
      dangerMode: false,
    })
    .then((willApprove) => {
      if (willApprove) {
        swal({
          title: "Confirmer l'action",
          text: "Pour des raisons de sécurité, nous vous invitons a introduire votre mot de passe",
          icon: "warning",
          buttons: true,
          content: {
            element: "input",
            attributes: {
              placeholder: "",
              type: "password",
              required: true,
              name: "userPassword",
            },
          },
          buttons: ["Annuler", "Rejeter"],
          dangerMode: true,
        }).then((value) => {
          if(!value){
            return false;
          }else{
            showBodyLoader();
            $.ajax({
              url: route('admin.ExitPermission.reject'),
              method: 'POST',
              data: {
                _token: $("meta[name=csrf-token]").attr('content'),
                permissionRef: exitPermissionRef,
                userPassword: value,
              },
              success: function(result){
                var response = $.parseJSON(result);
                hideBodyLoader();
                switch (response.status) {
                  case 404:
                  swal ("Oops" ,response.msg,"warning" );
                  break;

                  case 500:
                  swal ("Oops" ,response.msg,"error" );
                  break;
                  case 200:
                  swal ("Félicitations" ,response.msg,"success" );
                  setTimeout(function(){
                    window.location.reload(1);
                  }, 2000);
                  break;
                  default:

                }
              }
            });
          }
        });
      } else {
        return false
      }
    });
  });

  /////////// System settings section //////////
  $(".exitPermissionRefHelperModalAction").on('click', function(){
    $("#exitPermissionRefHelperModal").modal('show');
  });
  $(".multiLifeBaseSystem").change(function(){
    var value = $(this).is(":checked");
    //update the value in database
    $.ajax({
      url: route('admin.lifebase.updateMultiLifeBaseParam'),
      method: 'POST',
      data: {
        _token: $("meta[name=csrf-token]").attr('content'),
        multi_life_base_system: value,
      },
      success: function(result){
        var response = $.parseJSON(result);
        hideBodyLoader();
      }
    });
    if(value){
      $(".lifebasesList").show('fade');
    }else{
      $(".lifebasesList").hide('fade');
    }
  });

  $(".newLifeBaseAction").on('click', function(){
    $("#NewLifeBaseModal").modal('show');
  });

  $(".NewAdministratioAction").on('click', function(){
    $("#NewAdministrationModal").modal('show');
  });

});
