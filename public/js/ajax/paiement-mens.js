$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#payMensModal').hide();
    var table = $('.paiements').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/paiement",
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
             {data: 'numero', name: 'numero'},
             {data: 'mois', name: 'mois'},
             {data: 'annee', name: 'annee'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
        });


        $('body').on('click', '.show-list-abon', function () {
            let pay_id = $(this).data('id');
            var montant = 0;
            $.get('/paiements/data/'+pay_id,function(data){
                montant += data.abonnement.montant;
                $('input[name="montant"]').val(data.abonnement.montant);
                $('#payModal').modal('show');

                //change event

                $('input[name="montant_verse"]').on('keyup',function(){
                    if(parseInt($('input[name="montant"]').val()) - parseInt($('input[name="montant_verse"]').val()) < 0){
                        console.log('yoreloma lii');
                    }else{
                    $('input[name="montant_restant"]').val(data.abonnement.montant - parseInt($('input[name="montant_verse"]').val()));
                    }
                });
            });

        });


});
