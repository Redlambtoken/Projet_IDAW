//création de panier pour les repas
let panier=[];
//afficher les repas
    $(document).ready(function(){
        console.log("OUI");
        let int=0;
        $('#formRepas').submit(function(event){
            event.preventDefault();
            console.log("bouton cliquer");
            console.log($('#inputCat').val());
            if(Number($('#inputCat').val())!==0 && Number($('#inputCat2').val()) === 0 && Number($('#inputCat3').val()) === 0){
                console.log("Une caté selectionnée");
                console.log(Number($('#inputCat').val()));
                $.ajax({
                    url:"../backend/recettesAPI.php",
                    method: "GET",
                    data :{
                        ID_CAT: $('#inputCat').val()
                    },

                    success:function(data){
                        console.log(data);
                        console.log("la requête est validé");
                        const content =JSON.parse(data);
                        console.log(content);
                        $('#repas').empty;

                        data.forEach(function(item){
                            int++;
                            let aliment = JSON.parse(item);
                            console.log(item);
                            $('#repas').append('<button id=repas'+int+'>'+nom+'</button>')
                        })
                    },
                    error: function(xhr, status, error) {
                        $('#remarques').append('<p>NON Une erreur est survenue, nous n\'avons pas pu enregistrer votre avis</p>')
                    },
                })
            }
            if(Number($('#inputCat').val())!==0 && Number($('#inputCat2').val()) !== 0 && Number($('#inputCat3').val()) !== 0){
                $.ajax({
                    url:"../backend/recettesAPI.php",
                    method: "GET",
                    data :{
                        ID_CAT: $('#inputCat').val(),
                        ID_SCAT: $('#inputCat2').val(),
                        ID_SSCAT: $('#inputCat3').val()
                    },

                    success:function(data){
                        console.log(data);
                        $('#repas').empty;

                        data.forEach(function(item){
                            let nom=JSON.parse
                            int++;
                            $('#repas').append('<button id=repas'+int+'>'+nom+'</button>')
                        })
                    },
                    error: function(xhr, status, error) {
                        $('#remarques').append('<p>NON Une erreur est survenue, nous n\'avons pas pu enregistrer votre avis</p>')
                    },
                })
            }
            if(Number($('#inputCat').val())!==0 && Number($('#inputCat2').val()) !== 0 && Number($('#inputCat3').val()) === 0){
                $.ajax({
                    url:"../backend/recettesAPI.php",
                    method: "GET",
                    data :{
                        ID_CAT: $('#inputCat').val(),
                        ID_SCAT: $('#inputCat2').val()
                    },

                    success:function(data){
                        console.log(data);
                        $('#repas').empty;

                        data.forEach(function(item){
                            nomRepas(item);
                            if(int===0){
                                $('#repas').append('<button id="submitButton">Valider</button>')
                                int++;
                                $('#repas').append('<button id=repas'+int+' onclick="repasPanier()" nom="'+nom+'">'+nom+'</button>')
                            }
                            else{
                                int++;
                                $('#repas').append('<button id=repas'+int+' onclick="repasPanier()" nom="'+nom+'">'+nom+'</button>')
                            }
                        })
                    },
                    error: function(xhr, status, error) {
                        $('#remarques').append('<p>NON Une erreur est survenue, nous n\'avons pas pu accéder aux recettes</p>')
                    },
                })
            }   

        })
    })

function nomRepas(data){
    const nom = JSON.parse(data);
}

//ajouter un repas au panier
function repasPanier(){
    panier.push(nom);
    $("#panier").append()
}

//créer un repas
$(document).ready(function(){
    const currentDate = new Date();
    $('#ajouterRepas').on('click', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'calendeatAPI.php', // Remplacez par l'URL de votre fichier PHP ou API
            method: 'POST',          // Utilisez 'GET' si votre API ou serveur attend une requête GET
            dataType: 'json',
            data:JSON.stringify({
                date: currentDate,
                repas: panier
            }),
            
            sucess:function(data){
                $('#panier').empty;
                $('#panier').append('<p>Votre repas a bien été enregistrée');
            },

            error: function(xhr, status, error) {
                $('#panier').append('<p>Votre repas n\'a pas pu être enregistré</p>')
            },
        })
    })
})

    
