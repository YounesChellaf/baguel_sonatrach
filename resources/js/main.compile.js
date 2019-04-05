import {route} from './helpers.js';
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
  ///////////////////////////////////////////////////






});
