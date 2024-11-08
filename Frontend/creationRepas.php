<h1 style="padding-top:10px;text-align:center">Créer un nouveau repas</h1>
<br>
<table>
<form id="formRepas" action="">
    <h2 style="padding-bottom:15px">Recherche par catégorie</h2>

<div>
    <label for="Catégorie"style="padding-bottom:10px">Catégorie n°1 : </label>
    <select id="inputCat" name="catégorie" >
        <option value="0">Insérer valeur</option>
        <option value="1">entrees et plats composes</option>
        <option value="2">fruits, legumes, legumineuses et oleagineux</option>
        <option value="3">produits cerealiers</option>
        <option value="4">viandes, oeufs, poissons et assimiles</option>
        <option value="5">produits laitiers et assimiles</option>
        <option value="6">eaux et autres boissons</option>
        <option value="7">produits sucres</option>
        <option value="8">glaces et sorbets</option>
        <option value="9">matieres grasses</option>
        <option value="10">aides culinaires et ingredients divers</option>
        <option value="11">aliments infantiles</option>
    </select>
    <br>
    <label for="SCatégorie" style="padding-bottom:10px">Catégorie n°2 : </label>
    <select id="inputCat2" name="scatégorie">
        <option value="0">Insérer valeur</option>
        <option value="63">Céréales et biscuits infantiles</option>
        <option value="62">Desserts infantiles</option>
        <option value="61">Petits pots salés et plats infantiles</option>
        <option value="60">Laits et boissons infantiles</option>
        <option value="59">Ingrédients divers</option>
        <option value="58">Aides culinaires et ingrédients pour végétariens</option>
        <option value="57">Denrées destinées à une alimentation particulière</option>
        <option value="56">Algues</option>
        <option value="55">Herbes</option>
        <option value="54">Épices</option>
        <option value="53">Sels</option>
        <option value="52">Aides culinaires</option>
        <option value="51">Condiments</option>
        <option value="50">Sauces</option>
        <option value="49">Autres matières grasses</option>
        <option value="48">Huiles de poissons</option>
        <option value="47">Margarines</option>
        <option value="46">Huiles et graisses végétales</option>
        <option value="45">Beurres</option>
        <option value="44">Desserts glacés</option>
        <option value="43">Sorbets</option>
        <option value="42">Glaces</option>
        <option value="41">Gâteaux et pâtisseries</option>
        <option value="40">Barres céréalières</option>
        <option value="39">Céréales de petit-déjeuner</option>
        <option value="38">Biscuits sucrés</option>
        <option value="37">Viennoiseries</option>
        <option value="36">Confitures et assimilés</option>
        <option value="35">Confiseries non chocolatées</option>
        <option value="34">Chocolats et produits à base de chocolat</option>
        <option value="33">Sucres, miels et assimilés</option>
        <option value="32">Boissons alcoolisées</option>
        <option value="31">Boissons sans alcool</option>
        <option value="30">Eaux</option>
        <option value="29">Crèmes et spécialités à base de crème</option>
        <option value="28">Fromages et assimilés</option>
        <option value="27">Produits laitiers frais et assimilés</option>
        <option value="26">Laits</option>
        <option value="25">Substituts de produits carnés</option>
        <option value="24">Œufs</option>
        <option value="23">Produits à base de poissons et produits de la mer</option>
        <option value="22">Mollusques et crustacés crus</option>
        <option value="21">Mollusques et crustacés cuits</option>
        <option value="20">Poissons crus</option>
        <option value="19">Poissons cuits</option>
        <option value="18">Autres produits à base de viande</option>
        <option value="17">Charcuteries et assimilés</option>
        <option value="16">Viandes crues</option>
        <option value="15">Viandes cuites</option>
        <option value="14">Biscuits apéritifs</option>
        <option value="13">Pains et assimilés</option>
        <option value="12">Pâtes, riz et céréales</option>
        <option value="11">Fruits à coque et graines oléagineuses</option>
        <option value="10">Fruits</option>
        <option value="9">Légumineuses</option>
        <option value="8">Pommes de terre et autres tubercules</option>
        <option value="7">Légumes</option>
        <option value="6">Feuilletés et autres entrées</option>
        <option value="5">Sandwichs</option>
        <option value="1">salades composees et crudites</option>
        <option value="2">soupes</option>
        <option value="3">plats composes</option>
        <option value="4">pizzas, tartes et crepes salees</option>
    </select>
    <br>
    <label for="SSCatégorie"style="padding-bottom:10px">Catégorie n°3 : </label>
    <select id="inputCat3" name="sscatégorie">
        <option value="0">Insérer une valeur</option>
        <option value="10">Légumes crus</option>
        <option value="9">Plats végétariens</option>
        <option value="8">Plats de fromage</option>
        <option value="7">Plats de céréales/pâtes</option>
        <option value="6">Plats de légumes/légumineuses</option>
        <option value="5">Plats de poisson et féculents</option>
        <option value="4">Plats de poisson sans garniture</option>
        <option value="3">Plats de viande et légumes/légumineuses</option>
        <option value="2">Plats de viande et féculents</option>
        <option value="1">Plats de viande sans garniture</option>
        <option value="11">Légumes cuits</option>
        <option value="12">Légumes séchés ou déshydratés</option>
        <option value="13">Légumes et leurs produits de la Martinique</option>
        <option value="14">Légumes et leurs produits de la Réunion</option>
        <option value="15">Légumineuses cuites</option>
        <option value="16">Légumineuses fraîches</option>
        <option value="17">Légumineuses sèches</option>
        <option value="18">Fruits crus</option>
        <option value="19">Compotes et assimilés</option>
        <option value="20">Fruits appertisés</option>
        <option value="21">Fruits séchés</option>
        <option value="22">Fruits et leurs produits de la Martinique</option>
        <option value="23">Fruits et leurs produits de la Réunion</option>
        <option value="24">Pâtes, riz et céréales cuits</option>
        <option value="25">Pâtes, riz et céréales crus</option>
        <option value="26">Pains</option>
        <option value="27">Biscottes et pains grillés</option>
        <option value="28">Bœuf et veau</option>
        <option value="29">Porc</option>
        <option value="30">Poulet</option>
        <option value="31">Dinde</option>
        <option value="32">Agneau et mouton</option>
        <option value="33">Gibier</option>
        <option value="34">Autres viandes</option>
        <option value="35">Abats</option>
        <option value="36">Jambons cuits</option>
        <option value="37">Jambons secs et crus</option>
        <option value="38">Saucissons secs</option>
        <option value="39">Saucisses et assimilés</option>
        <option value="40">Pâtés et terrines</option>
        <option value="41">Rillettes</option>
        <option value="42">Quenelles</option>
        <option value="43">Autres spécialités charcutières</option>
        <option value="44">Substituts de charcuteries pour végétariens</option>
        <option value="45">Œufs cuits</option>
        <option value="46">Œufs crus</option>
        <option value="47">Omelettes et autres ovoproduits</option>
        <option value="48">Laits de vache liquides (non concentrés)</option>
        <option value="49">Laits autres que de vache</option>
        <option value="50">Laits de vache concentrés ou en poudre</option>
        <option value="51">Yaourts et spécialités laitières type yaourt</option>
        <option value="52">Fromages blancs</option>
        <option value="53">Desserts lactés</option>
        <option value="54">Autres desserts</option>
        <option value="55">Desserts végétaux</option>
        <option value="56">Fromages à pâte molle</option>
        <option value="57">Fromages à pâte persillée</option>
        <option value="58">Fromages à pâte pressée</option>
        <option value="59">Fromages fondus</option>
        <option value="60">Autres fromages et spécialités</option>
        <option value="61">Substituts de fromages pour végétariens</option>
        <option value="62">Jus</option>
        <option value="63">Nectars</option>
        <option value="64">Boissons rafraîchissantes sans alcool</option>
        <option value="65">Boissons rafraîchissantes lactées</option>
        <option value="66">Boissons végétales</option>
        <option value="67">Café, thé, cacao, etc. prêts à consommer</option>
        <option value="68">Boissons à reconstituer</option>
        <option value="69">Vins</option>
        <option value="70">Bières et cidres</option>
        <option value="71">Liqueurs et alcools</option>
        <option value="72">Cocktails</option>
        <option value="73">Sauces condimentaires</option>
        <option value="74">Sauces chaudes</option>
        <option value="75">Sauces sucrées</option>
        <option value="76">Herbes fraîches</option>
        <option value="77">Herbes séchées</option>
    </select>
    <br>
    Je veux limiter :
    <select id="inputNut1" name="nutriment">
        <option value="0">Insérer une valeur</option>
        <option value="36">AG 18 3, alpha-linolénique</option>
        <option value="37">AG 20 4 arachidonique</option>
        <option value="35">AG 18: 2 , linoléique</option>
        <option value="34">AG 18 1, oléique</option>
        <option value="33">AG 18 0, stéarique</option>
        <option value="32">AG 16 0, palmitique</option>
        <option value="31">AG 14 0, myristique</option>
        <option value="30">AG 12 0, laurique</option>
        <option value="29">AG 10 0, caprique</option>
        <option value="28">AG 8 0, caprylique</option>
        <option value="27">AG 6 0, caproïque</option>
        <option value="26">AG 4 0, butyrique</option>
        <option value="25">AG polyinsaturés</option>
        <option value="24">AG monoinsaturés</option>
        <option value="23">AG saturés</option>
        <option value="22">Acides organiques</option>
        <option value="21">Alcool</option>
        <option value="20">Cendres</option>
        <option value="19">Polyols totaux</option>
        <option value="18">Fibres alimentaires</option>
        <option value="17">Amidon</option>
        <option value="16">Saccharose</option>
        <option value="15">Maltose</option>
        <option value="14">Lactose</option>
        <option value="13">Glucose</option>
        <option value="12">Galactose</option>
        <option value="11">Fructose</option>
        <option value="10">Sucres</option>
        <option value="9">Lipides</option>
        <option value="8">Glucides</option>
        <option value="7">Protéines</option>
        <option value="6">Protéines</option>
        <option value="5">Eau</option>
        <option value="4">Énergie fibres</option>
        <option value="3">Énergie fibres</option>
        <option value="2">Énergie</option>
        <option value="1">Énergie</option>
        <option value="38">Iode</option>
        <option value="39">Magnésium</option>
        <option value="40">Manganèse</option>
        <option value="41">Phosphore</option>
        <option value="42">Potassium</option>
        <option value="43">Sélénium</option>
        <option value="44">Sodium</option>
        <option value="45">Zinc</option>
        <option value="46">Rétinol</option>
        <option value="47">Bêta-Carotène</option>
        <option value="48">Vitamine D</option>
        <option value="49">Vitamine E</option>
        <option value="50">Vitamine K1</option>
        <option value="51">Vitamine K2</option>
        <option value="52">Vitamine C</option>
        <option value="53">Vitamine B1</option>
        <option value="54">Vitamine B2</option>
        <option value="55">Vitamine B3</option>
        <option value="56">Vitamine B5</option>
        <option value="57">Vitamine B6</option>
        <option value="58">Vitamine B9</option>
        <option value="59">Vitamine B12</option>
    </select>
    <label for="chiffre"> < </label>
    <input type="number" id="chiffre" name="chiffre">
</div>
<div style="padding:10px"></div>
<button id="bouton" type="submit" style="padding-top:15px;padding-bottom:15px;border-radius:20px;width:150px">Rechercher</button>   
</form>
</table>
<div id="repas"></div>
<div id="panier"></div>
<div id="ajouterRepas" style="padding-top:15px;padding-bottom:15px;border-radius:20px;width:auto;float: right;
    margin-right: 20px"><button>Créer le repas</button></div>

<script src="js/creationRepas.js"></script>
