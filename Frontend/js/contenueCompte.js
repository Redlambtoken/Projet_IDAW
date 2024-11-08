let currentDate = new Date();

document.addEventListener('DOMContentLoaded', () => {
    renderCalendar();
});

function renderCalendar() {
    const monthYear = document.getElementById('month-year');
    const calendarDays = document.getElementById('calendar-days');

    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();

    // Affiche le mois et l'année dans l'en-tête
    const options = { month: 'long', year: 'numeric' };
    monthYear.textContent = currentDate.toLocaleDateString('fr-FR', options);

    // Obtenir le premier jour et le nombre de jours dans le mois
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    // Efface le calendrier
    calendarDays.innerHTML = '';

    // Remplit les cases vides au début du mois
    for (let i = 0; i < firstDay; i++) {
        const emptyCell = document.createElement('div');
        calendarDays.appendChild(emptyCell);
    }

    // Crée les jours du mois
    for (let day = 1; day <= daysInMonth; day++) {
        const dayCell = document.createElement('div');
        dayCell.textContent = day;

        // Marquer la date actuelle
        if (day === new Date().getDate() &&
            month === new Date().getMonth() &&
            year === new Date().getFullYear()) {
            dayCell.classList.add('today');
        }

        calendarDays.appendChild(dayCell);
    }
}

function changeMonth(direction) {
    currentDate.setMonth(currentDate.getMonth() + direction);
    renderCalendar();
}

// afficher les repas du jour
$(document).ready(function(){
    $.ajax({ 
        url: "../backend/calendeatAPI.php",
        method: "GET",
        dataType: "json",
        contentType: 'application/json',
            
        success: function(data) {
            console.log("oui");
            if (data.error) {
            alert("Erreur : " + data.error);
                return;
            }
            console.log(data);

            $('#repas').empty();

            if (data && Object.keys(data).length === 0) {
                //alert("Aucun résultat trouvé.");
            } else {
            
                data.forEach(function(item){
                    $('#repas').append('<div>'+item.DATE_REPAS+ " : " +item.LABEL_ALIMENT +'</div>')
                })
            
            /*data.forEach(function(item) {
                let result=afficherRepas(item);
                $('#repas').append('<div>' + result[0]+ '</div>'+'<div>'+ result[1]+'</div>');
            });*/
            }
        }
    })
})

$(document).ready(function(){
    $.ajax({ 
            url: "../backend/calendeatCalculAPI.php",
            method: "GET",    
            success: function(data) {
                if (data.error) {
                alert("Erreur : " + data.error);
                    return;
                }
                console.log("qilsugdfhj");
                console.log(data);

                if (data && Object.keys(data).length === 0) {
                    //alert("Aucun résultat trouvé.");
                }
                let array = {}; //array[0][] -> ID nutriment array[][0] -> Quantite array[][1] -> GOAL
                let i =0;
                data.forEach(function(item){
                    if(array[item.ID_NUTRIMENT] == null){
                        array[item.ID_NUTRIMENT] = [Number(item.QUANTITE),Number(item.GOAL), item.LABEL_NUTRIMENT] ;
                    }
                    else {
                        array[item.ID_NUTRIMENT][0] += Number(item.QUANTITE);
                    }
                })

                Object.keys(array).forEach(function(key) {
                    $rest = array[key][1] - array[key][0];
                    if($rest<= 0){
                        console.log("BIEN");
                    }
                    else{
                        $('#repasGoal').append('<div>Tu dois encore manger '+ $rest + " en " + array[key][2] +'</div>')
                    }
                });
                /*array.forEach(element => {
                    if(element[1] - element[0] <= 0){
                        
                    }
                    else{
                        $('#repas').append('<div>'+item.LABEL_ALIMENT + "<-" + item.DATE_REPAS+'</div>')
                    }
                });*/
            }
        })
})

//afficher les repas en fonction de la valeur du menu déroulant
$(document).ready(function(){
    console.log("hello");
    $(document).on('change', '#NbrJour', function() {
        let int = $(this).val();
        console.log("hy");
        if(int !=0){
        $.ajax({ 
            url: "../backend/calendeatAPI.php",
            method: "GET",
            dataType: "json",
            data: {day: int},
            
            success: function(data) {
                if (data.error) {
                alert("Erreur : " + data.error);
                    return;
                }
                console.log("oui");
                console.log(data);

                $('#repas').empty();

                if (data && Object.keys(data).length === 0) {
                    //alert("Aucun résultat trouvé.");
                } else {
            
                data.forEach(function(item){
                    $('#repas').append('<div>'+item.DATE_REPAS+ " : " +item.LABEL_ALIMENT +'</div>')
                })
            
            /*data.forEach(function(item) {
                let result=afficherRepas(item);
                $('#repas').append('<div>' + result[0]+ '</div>'+'<div>'+ result[1]+'</div>');
            });*/
                }
            }
        })
        }
        else{
            $.ajax({ 
            url: "../backend/calendeatAPI.php",
            method: "GET",
            dataType: "json",
            
            success: function(data) {
                if (data.error) {
                alert("Erreur : " + data.error);
                    return;
                }
                console.log("oui");
                console.log(data);

                $('#repas').empty();

                if (data && Object.keys(data).length === 0) {
                    //alert("Aucun résultat trouvé.");
                } else {
            
                data.forEach(function(item){
                    $('#repas').append('<div>'+item.DATE_REPAS+ " : " +item.LABEL_ALIMENT +'</div>')
                })
            
            /*data.forEach(function(item) {
                let result=afficherRepas(item);
                $('#repas').append('<div>' + result[0]+ '</div>'+'<div>'+ result[1]+'</div>');
            });*/
                }
            }
        })
        }
    })
});

function afficherRepas(data) {
    let cle1 = Object.keys(item)[0];
    let date = avisPage[cle1];
    let cle2 = Object.keys(item)[1];
    let contenu = avisPage[cle2];
        
    return [date, contenu]; 
    
}

//poster un avis
$(document).ready(function(){
    $('#ratingForm').submit(function(event){
        event.preventDefault();
        let rating = document.getElementById('rating-value').innerHTML;
        $.ajax({
            url:"../backend/avisAPI",
            method: "POST",
            dataType : "json",
            contentType: "application/json",
            data :JSON.stringify({
                Text: $('#Text').val(),
                Note: rating
            }),
        
            success : function(response){
                //alert("Aucun résultat trouvé.");
                console.log("YEP");
                $('#remarques').append('<p>Merci pour votre avis</p>')
            },
            error: function(xhr, status, error) {
                alert("NOPE");
                $('#remarques').append('<p>NON Une erreur est survenue, nous n\'avons pas pu enregistrer votre avis</p>')
            },
        })
    }) 
})

document.addEventListener("DOMContentLoaded", function() {
    const stars = document.querySelectorAll(".star");
    const ratingValue = document.getElementById("rating-value");
    
    stars.forEach(star => {
        star.addEventListener("click", function() {
            const selectedRating = this.getAttribute("data-value");
            ratingValue.textContent = selectedRating;

            // Met à jour l'affichage des étoiles
            stars.forEach(s => s.classList.remove("selected"));
            this.classList.add("selected");
            let prevSibling = this.previousElementSibling;
            while (prevSibling) {
                prevSibling.classList.add("selected");
                prevSibling = prevSibling.previousElementSibling;
            }
        });
    });
});

//avis et étoile
const stars = document.querySelectorAll('.star');
    let selectedRating = 0;

    stars.forEach(star => {
        star.addEventListener('click', () => {
            selectedRating = star.getAttribute('data-value');
            updateStars(selectedRating);
        });
    });

    function updateStars(rating) {
        stars.forEach(star => {
            if (star.getAttribute('data-value') <= rating) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }