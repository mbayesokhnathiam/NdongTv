$(function() {


var input_secteur = $('#input-secteur');
var input_amplie = $('#input-amplie');
var input_prix_tv = $('#input-prix-tv');
var input_nb_tv = $('#input-nb-tv');
var input_montant = $('#input-montant');


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#input-secteur').on('change',function(){


    if(input_secteur.val() != ""){
        let id_secteur = parseInt(input_secteur.val());
        $.get('/abonnes/amplies/'+id_secteur).done(function(data){
            input_amplie.empty();
           if(data.data.length > 0){
            input_amplie.removeAttr('disabled');
            console.log(data.data);
            data.data.forEach(element => {
                input_amplie.append($("<option />").val(element.id).text(element.adresse));
            });
           }else{
            input_amplie.empty();
            input_amplie.attr('disabled','disabled');
           }
         })
        .fail(function(xhr, status, error) {
            // error handling
            input_amplie.empty();
            console.log('Failed');

        });
    }
});

input_prix_tv.on('keyup',function(){
    if(input_nb_tv.val() !== ''){
        input_montant.val(parseInt(input_nb_tv.val())*parseInt(input_prix_tv.val()));
    }

});

input_nb_tv.on('keyup',function(){
    if(input_prix_tv.val() !== ''){
        input_montant.val(parseInt(input_nb_tv.val())*parseInt(input_prix_tv.val()));
    }
});



var table = $('#abonne-datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "/abonnes",
    language: {
        processing: "Traitement en cours...",
        search: "Rechercher&nbsp;:",
        lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
        info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
        infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
        infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix: "",
        loadingRecords: "Chargement en cours...",
        zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
        emptyTable: "Aucune donnée disponible dans le tableau",
        paginate: {
            first: "Premier",
            previous: "Pr&eacute;c&eacute;dent",
            next: "Suivant",
            last: "Dernier"
        },
        aria: {
            sortAscending: ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant"
        },
        select: {
            rows: {
                "_": "%d lignes sélectionnées",
                "0": "Aucune ligne sélectionnée",
                "1": "1 ligne sélectionnée"
            }
        }
    },
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'abonne.prenom', name: 'abonne.prenom'},
        {data: 'abonne.nom', name: 'abonne.nom'},
        {data: 'abonne.telephone', name: 'abonne.telephone'},
        {data: 'nb_tv', name: 'nb_tv'},
        {data: 'amply.adresse', name: 'amply.adresse'},
        {data: 'amply.secteur.numero', name: 'amply.secteur.numero'},
        {data: 'montant', name: 'montant'},
        {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },
    ]
    });

    $('body').on('click', '.disable-abon', function () {
        let abon_id = $(this).data('id');
        console.log(abon_id);
    });

    $('body').on('click', '.enable-abon', function () {
        let abon_id = $(this).data('id');
        console.log(abon_id);
    });

    $('body').on('click', '.update-abon', function () {
        let abon_id = $(this).data('id');
        window.location.href = "/abonnes/" + abon_id + "/edit";
    });


    //Init amplie list by secteur

    if(input_secteur.val() != ""){
        var abonnement = $('#abonnement_id');
        let id_secteur = parseInt(input_secteur.val());
        let id_abonnement = parseInt(abonnement.val());
        $.get('/abonnes/amplies/'+id_secteur).done(function(data){

           if(data.data.length > 0){
            input_amplie.removeAttr('disabled');
            data.data.forEach(element => {
                input_amplie.append($("<option />").val(element.id).text(element.adresse));
            });
           }
         })
        .fail(function(xhr, status, error) {
            // error handling
            input_amplie.empty();

        });

        $.get('/abonnes/'+id_abonnement).done(function(data){

            if(data.data !== null){
                input_secteur.val(data.data.amply.secteur_id);
                input_amplie.val(data.data.amply.id);
            }
          })
         .fail(function(xhr, status, error) {
             // error handling
             input_amplie.empty();

         });
    }

    
});
