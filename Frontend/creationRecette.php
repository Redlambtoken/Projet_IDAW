<h1 style="padding:10px">Une nouvelle recette ?</h1>

<form onsubmit="SentAjaxRequest(this)">
    <input type="submit" value="Créer la recette">
    <label for="inputNom" class="col-sm-2 col-form-label">Nom de la recette</label>
    <div style="padding-bottom:10px">
        <input type="text" class="form-control" id="inputNom" >
    </div>
    <label for="sexe">Apport énergétique* : </label>
    <select id="sexe" name="sexe">
        <option value="1">Energie</option>
        <option value="2">Energie fibres</option>
        <option value="3">Eau</option>
    </select>
    <button onclick="AddCategories()" style="width: 45px;border-radius: 45px; background-color:#3f8955;">+</button>
    <ul id="ListToAppend">

    </ul>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/creationRecette.js"></script>
