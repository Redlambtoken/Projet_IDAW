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
        <label for="Jour" style="padding-bottom:10px">Afficher les repas : 
            <select id="NbrJour" name="jour"> 
                <option value="0">Insérer valeur</option>
                <option value="2">des trois derniers jours</option>
                <option value="6">de la semaine</option>
                <option value="13">de deux semaines</option>
            </select>
        </label>
        <div id="repasAccount"></div>
        <div id="repasGoal"></div>
    </div>
</div>
<br>
<div>
    <form id="ratingForm" class="form-container">
    <h3>Donner mon avis sur le site</h3>
    <div class="zoneText">
        <textarea id="Text" name="comment" placeholder="Laissez un commentaire..."></textarea>
        <button type="submit">Envoyer</button>
    </div>
    <div class="rating-container">
        <div class="rating">
            <span class="star" data-value="5">★</span>
            <span class="star" data-value="4">★</span>
            <span class="star" data-value="3">★</span>
            <span class="star" data-value="2">★</span>
            <span class="star" data-value="1">★</span>
        </div>
        <span id="rating-value"></span>
    </div>
</form>
</div>
<div id="remarques"></div>

<script src="js/contenueCompte.js"></script>