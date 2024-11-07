let IsAlreadyHere = false;

    function AddCategories(){
        IsAlreadyHere = false;
        event.preventDefault();
        let items = document.getElementsByClassName("item");
        for (i = 0; i<items.length; i++){
            if(items[i].firstChild.textContent.replaceAll(' ', '') == $("#sexe option:selected").text().replaceAll(' ', '')){
                IsAlreadyHere = true;
                break;
            }
        }
        if(IsAlreadyHere == false){
            event.preventDefault();
            $('#ListToAppend').append('<li class="item">' + $("#sexe option:selected").text() + '  <input type="number" step="0.001" id="quantite" value="quantite" required=""><br> </li>');
        }
    }

    function SentAjaxRequest(valeur){
        event.preventDefault();
        let nameR = valeur[1].value;
        let IDAs = [];
        let QTEs = [];
        let items = document.getElementsByClassName("item");
        for (i=0; i<items.length; i++){
            IDAs.push(items[i].firstChild.textContent.replaceAll(' ', ''));
            QTEs.push(valeur[i+4].value);
        }
        $.ajax({ 
                url: "../backend/recettesAPI.php",
                method: "POST",
                dataType: "json",
                contentType : "application/json",
                data: JSON.stringify({
                    nameR: nameR,
                    IDas: IDAs,
                    Qtes: QTEs
                }),
                success: function(response) {
                    alert(response);
                    if (response === 200) {
                        window.location.href = 'pageCompte.php';
                    } else if (response === 400) {
                        alert("Login ou mot de passe incorrect");
                    }
                },
                error: function() {
                    alert("Une erreur est survenue lors de la connexion. Veuillez réessayer.");
                }
            });
    }