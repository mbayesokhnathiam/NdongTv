

$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#payModal').hide();

        $('body').on('click', '.show-pay', function () {
            let pay_id = $(this).data('id');

            $.post("paiements/mens/id",
            {
                id: pay_id
            },
            function(id, status){
                window.location.href = "/paiements/" + id;
            });

        });


        var table = $('.abonnement-pay').DataTable({
            processing: true,
            serverSide: true,
            ajax: document.location.href,
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
                 {data: 'abonnement.amply.secteur.numero', name: 'abonnement.amply.secteur.numero'},
                 {data: 'abonnement.amply.adresse', name: 'abonnement.amply.adresse'},
                 {data: 'abonnement.abonne.prenom', name: 'abonnement.abonne.prenom'},
                 {data: 'abonnement.abonne.nom', name: 'abonnement.abonne.nom'},
                 {data: 'abonnement.abonne.telephone', name: 'abonnement.abonne.telephone'},
                 {data: 'abonnement.montant', name: 'abonnement.montant'},
                 {data: 'montant_verse', name: 'montant_verse'},
                 {data: 'montant_restant', name: 'montant_restant'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
            });


            // $('body').on('click', '.show-pay-modal', function () {
            //     let pay_id = $(this).data('id');
            //     var montant = 0;
            //     $.get('/paiements/data/'+pay_id,function(data){
            //         montant += data.abonnement.montant;
            //         $('input[name="montant"]').val(data.montant_restant);
            //         $('#payModal').modal('show');

            //         //change event

            //         $('input[name="montant_verse"]').on('keyup',function(){
            //             if(){
            //                 console.log('yoreloma lii');
            //             }else{
            //             $('input[name="montant_restant"]').val(data.montant_restant - parseInt($('input[name="montant_verse"]').val()));
            //             }
            //         });
            //     });

            // });

            $('body').on('click', '.show-pay-modal', function () {
                let pay_id = $(this).data('id');
                var montant = 0;
                $.get('/paiements/data/'+pay_id,function(data){
                    montant += data.abonnement.montant;
                    $('input[name="montant"]').val(data.montant_restant);
                    $('input[name="id"]').val(data.abonnement.id);
                    $('#payModal').modal('show');
    
                    //change event
    
                    $('input[name="montant_verse"]').on('keyup',function(){
                        if(parseInt($('input[name="montant"]').val()) - parseInt($('input[name="montant_verse"]').val()) < 0 || isNaN(parseInt($('input[name="montant"]').val()) - parseInt($('input[name="montant_verse"]').val()))){
                            $('#error-message').text('Le montant versé ne peut pas être supérieur au montant total à payer');
                            $('#error-message').show();
                            $('#save-pay-user').hide();
                        }else{
                            $('#error-message').hide();
                            $('#save-pay-user').show();
                            data.montant_restant - parseInt($('input[name="montant_verse"]').val()) >= 0 ? $('input[name="montant_restant"]').val(data.montant_restant - parseInt($('input[name="montant_verse"]').val())) : $('input[name="montant_restant"]').val('0');
                        }
    
    
                        
                    });
                });
    
            });
            $('#save-pay-user').hide();
});
