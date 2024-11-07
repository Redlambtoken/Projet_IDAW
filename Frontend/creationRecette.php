<p>Une nouvelle recette ?</p>

<form onsubmit="SentAjaxRequest(this)">
    <input type="submit" value="Submit">
    <label for="inputNom" class="col-sm-2 col-form-label">Nom de la recette</label>
    <div>
        <input type="text" class="form-control" id="inputNom" >
    </div>
    <label for="sexe">Sexe* : </label>
    <select id="sexe" name="sexe">
        <option value="1">Energie</option>
        <option value="2">Energie fibres</option>
        <option value="3">Eau</option>
    </select>
    <button onclick="AddCategories()">+</button>
    <ul id="ListToAppend">

    </ul>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/creationRecette.js"></script>
