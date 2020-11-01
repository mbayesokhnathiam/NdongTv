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
        console.log(id_secteur);

        $.get('/abonnes/amplies/'+id_secteur).done(function(data){
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
    console.log(input_prix_tv.val());

    if(input_nb_tv.val() !== ''){
        input_montant.val(parseInt(input_nb_tv.val())*parseInt(input_prix_tv.val()));
    }

});

input_nb_tv.on('keyup',function(){
    if(input_prix_tv.val() !== ''){
        input_montant.val(parseInt(input_nb_tv.val())*parseInt(input_prix_tv.val()));
    }
});

