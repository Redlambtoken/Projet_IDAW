<div class="container">
    <div class="calendar-container">
        <div class="calendar-header">
            <button onclick="changeMonth(-1)">&#9664;</button>
            <h2 id="month-year"></h2>
            <button onclick="changeMonth(1)">&#9654;</button>
        </div>
        <div class="calendar">
            <div class="days-of-week">
                <div>Dim</div>
                <div>Lun</div>
                <div>Mar</div>
                <div>Mer</div>
                <div>Jeu</div>
                <div>Ven</div>
                <div>Sam</div>
            </div>
            <div id="calendar-days" class="calendar-days"></div>
        </div>
    </div>
    <div class="presentationRepas">
        <label for="Jour">Afficher les repas : 
            <select id="NbrJour" name="jour">
                <option value="0">Insérer valeur</option>
                <option value="2">des trois derniers jours</option>
                <option value="6">de la semaine</option>
                <option value="13">de deux semaines</option>
            </select>
        </label>
        <div id="repas"></div>
    </div>
</div>
<br>
<div class="ajoutAvis">
    Donner mon avis sur le site
    <div>
        <textarea id="textInput" rows="4" cols="50" placeholder="Écrivez ici..."></textarea>
        <button id="posterAvis">Soumettre</button>
        <div id="remarques"></div>
    </div>
</div>

<script>
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
    let int =0;
    $.ajax({ 
        url: "../backend/calendeatAPI.php",
        method: "GET",
        dataType: "json",
        contentType: 'application/json',
        data: {int : int},
            
        success: function(data) {
            console.log("oui");
            if (data.error) {
            alert("Erreur : " + data.error);
                return;
            }
            console.log(data);

            $('#repas').empty();

            if (data && Object.keys(data).length === 0) {
                alert("Aucun résultat trouvé.");
            } else {
            
                data.forEach(function(item){
                    $('#repas').append('<div>'+item.nom+'</div>')
                })
            
            /*data.forEach(function(item) {
                let result=afficherRepas(item);
                $('#repas').append('<div>' + result[0]+ '</div>'+'<div>'+ result[1]+'</div>');
            });*/
            }
        }
    })
})

//afficher les repas en fonction de la valeur du menu déroulant
$(document).ready(function(){
    console.log("hello");
    $(document).on('change', '#NbrJour', function() {
        let int = $(this).val();
        console.log("hy");

        $.ajax({ 
            url: "../backend/calendeatAPI.php",
            method: "GET",
            dataType: "json",
            data: {value: int},
            
            success: function(data) {
                if (data.error) {
                alert("Erreur : " + data.error);
                    return;
                }
                console.log("oui");
                console.log(data);

                $('#repas').empty();

                if (data && Object.keys(data).length === 0) {
                    alert("Aucun résultat trouvé.");
                } else {
            
                data.forEach(function(item){
                    $('#repas').append('<div>'+item.nom+'</div>')
                })
            
            /*data.forEach(function(item) {
                let result=afficherRepas(item);
                $('#repas').append('<div>' + result[0]+ '</div>'+'<div>'+ result[1]+'</div>');
            });*/
                }
            }
        })
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
$('#posterAvis').on('click', function(){
    console.log("OUI");
    $.ajax({
        url:"../backend/avisAPI",
        method: "POST",
        data :JSON.stringify({
            Text:$('#textInput').val()
        }),
        
        success : function(response){
            console.log("YEP");
            $('#remarques').append('<p>Merci pour votre avis</p>')
        },
        error: function(xhr, status, error) {
            
            $('#remarques').append('<p>Une erreur est survenue, nous n\'avons pas pu enregistrer votre avis</p>')
        },
    })
})

</script>