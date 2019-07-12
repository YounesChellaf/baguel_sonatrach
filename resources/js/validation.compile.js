$(document).ready(function(){
    $.validator.addMethod("isAlpha", function(value) {
        return /^[A-Za-z0-9]*$/.test(value) // consists of only these
            && /[a-z]/.test(value) // has a lowercase letter
    });
    $(".direction-add").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
            address: {
                required: true,
                minlength : 5
            }
        },
        messages: {
            name : {
                required:"Veuillez introduire une designation",
                minlength:"la designation doit comporter plus que 3 caractere",
            },
            address : {
              required :  "L'addresse est obligatoire",
                minlength:"l'addresse doit comporter plus que 5 caractere",
            }
        },
    });
    $(".meeting-room-add").validate({
        rules: {
            designation: {
                required: true,
            },
            location: {
                required: true,
            },
            total_capacity: {
                required: true,
                type: number,
            }
        },
        messages: {
            designation : {
                required:"Veuillez introduire une designation",
            },
            location : {
                required:"L'emplacement est obligatoire",
            },
            total_capacity : {
                required:"La capacité de la salle est obligatoire",
                type:"La capacité de la salle doit etre un entier"
            }
        },
    });
    $(".service-add").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
            select: {
                required: true,
            }
        },
        messages: {
            name : {
                required:"Veuillez introduire une designation",
                minlength:"la designation doit comporter plus que 3 caractere",
            },
            select : {
              required :  "La direction est obligatoire",
            }
        },
    });

    $(".new-add").validate({
        rules: {
            type: {
                required: true,
            },
            marque :{
                required : true
            },
        },
        messages: {
            type : {
                required:"Veuillez introduire le type d equipement",
            },
            marque  : {
                required :  "Veuillez introduire une marque",
            },

        },
    });
    $(".bloc-add").validate({
        rules: {
            name: {
                required: true,
            },
            number: {
                required: true,
            },
            type :{
                required : true
            },
        },
        messages: {
            name : {
                required:"Veuillez introduire une designation",
            },
            number  : {
              required :  "Le numéro est obligatoire",
            },
            type : "le type est obligatoire ",
        },
    });
    $(".office-add").validate({
        rules: {
            number: {
                required: true,
            },
            bloc_id :{
                required : true
            },
        },
        messages: {
            number : {
                required:"Veuillez introduire le numéro de bureau",
            },
            bloc_id  : {
              required :  "Veuillez choisir un bloc",
            },

        },
    });

    $(".room-add").validate({
        rules: {
            number: {
                required: true,
            },
            bloc_id :{
                required : true
            },
        },
        messages: {
            number : {
                required:"Veuillez introduire le numéro de chambre",
            },
            bloc_id  : {
              required :  "Veuillez choisir un bloc",
            },

        },
    });
});