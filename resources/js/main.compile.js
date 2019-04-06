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

  /////////// Init User database //////////
  initUsersDataTable();
  /////////////////////////////////////////

  /////////// Handle new user form actions //////////
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
              },
              success: function(responce){
                alert($.parseJSON(responce));
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






});
