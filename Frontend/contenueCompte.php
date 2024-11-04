<div class="container">
    <div class="calendar-container">
        <div class="calendar-header">
            <button onclick="changeMonth(-1)">&#9664;</butto>
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
                <option value="1">des trois derniers jours</option>
                <option value="2">de la semaine</option>
                <option value="3">de deux semaines</option>
            </select>
        </label>
        <div id="repas"></div>
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

$(document).ready(function(){
    const currentDate= new Date();
    let int=0;
    if ($('#NbrJour').val()===0){
        int =0;
    }
    if($('#NbrJour').val()===1){
        int=2;
    }
    if($('#NbrJour').val()===2){
        int=6;
    }
    if($('#NbrJour').val()===3){
        int =13;
    }
    currentDate.setDate(currentDate.getDate() - int);
    const data = {
        date: currentDate.toISOString()
    };
    const date =JSON.stringify(currentDate);
    $.ajax({ 
        url: "../backend/CalendeatAPI.php",
        method: "GET",
        dataType: "json",
        contentType: 'application/json',
        data: JSON.stringify(data),
            
        success: function(data) {
            if (data.error) {
            alert("Erreur : " + data.error);
                return;
            }
            console.log(data);

            $('#repas').empty();
        }
    })
});

</script>