$(document).ready(function() {

    $('.btndeletedirections').click(function(e){
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
            } else {
              swal("Your imaginary file is safe!");
            }
          });
    });

    $('#open').on('shown.bs.modal', function() {
      $('#nom').trigger('focus');
    });

    $('#supprimer').on('shown.bs.modal', function() {
      $('#').trigger('focus');
    });
});

function open_modal(){
    $('#open').modal('toggle');
    $('#nom').trigger('focus');
}

function open_supprimer_modal(){
    $('#supprimer').modal('toggle');
}

$(document).ready(function() {

    $(document).on('change','.directionsservices',function(){
        var id_direcion = $(this).val();
        var div = $(this).parents();
        var op = "";
        console.log(id_direcion);
        $.ajax({
            url:'/TrouvezNomServices',
            type:'GET',
            // url:`{!!URL::to('TrouvezNomServices')!!}`,
            data:{'id':id_direcion},
            success:function(data){
                console.log('success');
                console.log(data);
                op+='<option value="0" selected="true" disabled="true"></option>';
                for(var i= 0; i < data.length; i++){
                    op+='<option value="'+data[i].id+'">'+ data[i].nom_services +'</option>';
                }
                div.find('.nomservices').html("");
                div.find('.nomservices').append(op);
            },
            error:function(){

            }
        });
    });

    $(document).on('change','.servicesdivisions',function(){
        var id_service = $(this).val();
        var div = $(this).parents();
        var op = "";
        console.log(id_service);
        $.ajax({
            type:'get',
            url:'/TrouvezNomDivisions',
            data:{'id':id_service},
            success:function(data){
                console.log('success');
                console.log(data);
                op+='<option value="0" selected="true" disabled="true"></option>';
                for(var i= 0; i < data.length; i++){
                    op+='<option value="'+data[i].id+'">'+ data[i].nom_divisions +'</option>';
                }
                div.find('.nomdivisions').html("");
                div.find('.nomdivisions').append(op);
            },
            error:function(){

            }
        });
    });

    $(".file-upload").on('change', function(){
        readURL(this);
    });


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

});


/********************************** Algorithme du Date et Heure ******************************************/

// Voici les tableaux du mois de l'ann??e
var tableauMois = new Array(
    'janvier',
    'f??vrier',
    'mars',
    'avril',
    'mai',
    'juin',
    'juillet',
    'ao??t',
    'septembre',
    'octobre',
    'novembre',
    'd??cembre'
);

//Voici les tableaux du jours
var tableauJours = new Array(
    'Dimanche',
    'Lundi',
    'Mardi',
    'Mercredi',
    'Jeudi',
    'Vendredi',
    'Samedi'
);

// Affiche l'heure une seule fois
function afficherDateHeure(){
    // Contient toutes les infos que l'on a besoin sur la date et l'heure
    var dateGlobale = new Date();

    // On r??cup??re l'ann??e
    var annee = dateGlobale.getFullYear();

    //On r??cup??re le num??ro du mois
    var mois = dateGlobale.getMonth();

    // On assigne le bon mois
    mois = tableauMois[mois];

    // On r??cup??re le num??ro du jours
    var jour = dateGlobale.getDay();

    // On assigne le bon jour
    jour = tableauJours[jour];

    //On r??cup??re le num??ru jour, ... oui ??a n'est pas tr??s explicite.
    var numeroJour = dateGlobale.getDate();

    // On r??cup??re l'heure
    var heure = dateGlobale.getHours();
    if(heure < 10){
        heure = "0" + heure.toString();
    }


    // On r??cup??re les minutes
    var minute = dateGlobale.getMinutes();
    if(minute < 10){
        minute = "0" + minute.toString();
    }
    // On r??cup??re les secondes
    var seconde = dateGlobale.getSeconds();
    if(seconde < 10){
        seconde = "0" + seconde.toString();
    }

    // On r??cup??re notre span "date_heure"
    var dateHeure = document.getElementById("date_heure");

    dateHeure.innerHTML = jour + ", " + numeroJour + " " + mois + " " + annee + "\t " + heure + " : " + minute + " : " + seconde;
}


// Affichera toutes les secondes de notre heure
function afficherChaqueSecondeHeure(){
    // On affiche une premi??re fois l'heure pour ??viter un blanc d'une secondes
    afficherDateHeure();
    var delais = 1000;
    setInterval('afficherDateHeure()',delais);
}

/************************************* */
