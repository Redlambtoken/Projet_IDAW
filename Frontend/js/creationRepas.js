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
                        $('#repas').empty();

                        data.forEach(function(item){
                            int++;

                            console.log(item);
                            $('#repas').append('<button onclick="repasPanier(this)" class="uneRecette" id='+item.ID_ALIMENT+'>'+item.LABEL_ALIMENT+'</button>')                        })
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
                        $('#repas').empty();

                        data.forEach(function(item){
                            int++;
                            $('#repas').append('<button onclick="repasPanier(this)" class="uneRecette" id='+item.ID_ALIMENT+'>'+item.LABEL_ALIMENT+'</button>')                        })
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
                        $('#repas').empty();

                        data.forEach(function(item){
                            if(int===0){
                                int++;
                                $('#repas').append('<button onclick="repasPanier(this)" class="uneRecette" id='+item.ID_ALIMENT+'>'+item.LABEL_ALIMENT+'</button>')                            }
                            else{
                                int++;
                                $('#repas').append('<button onclick="repasPanier(this)" class="uneRecette" id='+item.ID_ALIMENT+'>'+item.LABEL_ALIMENT+'</button>')                            }
                        })
                    },
                    error: function(xhr, status, error) {
                        $('#remarques').append('<p>NON Une erreur est survenue, nous n\'avons pas pu accéder aux recettes</p>')
                    },
                })
            }   

        })
    })

//ajouter un repas au panier
function repasPanier(item){
    $('#panier').append('<button class="SelectedRepas uneRecette" onclick="SupprimerRepas(this)" id="'+item.id+'" nom="'+item.textContent+'">'+item.textContent+'</button>')
}

function SupprimerRepas(item){
    //on supprime le repas
    item.remove();
}

//créer un repas
$(document).ready(function(){
    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Les mois commencent à 0
    const day = String(currentDate.getDate()).padStart(2, '0');
    const formattedDate = `${year}-${month}-${day}`;
    $('#ajouterRepas').on('click', function(event) {
        let array = document.getElementsByClassName("SelectedRepas");
        console.log(array);
        let arrayID = [];
        let arrayQuantite = [];
        for(j=0; j< array.length; j++){
            let Exist = -1;
            for(i = 0; i<arrayID.length; i++){
                console.log("i -> " + i);
                console.log("j -> " + j);
                console.log("arrayID[i] = " + arrayID[i]);
                console.log("array[j].id = " + array[j].id)
                if(arrayID[i] == array[j].id){
                    Exist = i;
                    break;
                }
            }
            if(Exist != -1){
                arrayQuantite[Exist]++;
            }
            else{
                arrayID.push(array[j].id);
                arrayQuantite.push(1);
            }
        }
        event.preventDefault();
        $.ajax({
            url: '../backend/calendeatAPI.php', 
            method: 'POST',          
            dataType: 'json',
            contentType: 'application/json',
            data:JSON.stringify({
                date: formattedDate,
                recettes: arrayID,
                QTEs : arrayQuantite
            }),
            
            success:function(data){
                $('#panier').empty();
                $('#panier').append('<p>Votre repas a bien été enregistrée');
            },

            error: function(xhr, status, error) {
                $('#panier').append('<p>Votre repas n\'a pas pu être enregistré</p>')
            },
        })
    })
})

    
