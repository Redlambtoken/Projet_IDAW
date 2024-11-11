# Calend'eat

## Format du site 

7 pages :
    - Page d'accueil : pageAccueil.php
        * Page de connexion : PageConnexion.php
        * Page de création de compte : pageCreation.php
        * Page d'annonce du compte crée :pageCompteCree.php
    - Page d'Accueil du compte 
        * Page de création de recettes : pageRecette.php
        * Page de création de repas : pageRepas.php
    

## Affichage

Chaque page a une :
    - page header
    - page contenue
    - page footer

### Page Header

#### Header de l'accueil

Le header de l'accueil et des pages associés contient le logo de l'application ainsi qu'un menu déroulant qui permet d'afficher les différentes pages associèes.
Une partie dédiée aux citations où s'affiche de manière aléatoire une citation contenue dans la base de donnée. Pour afficher une citation on utilise une requête AJAX de type GET.

#### Header des comptes 

Le header de la page d'accueil du compte et des pages associées contient le logo de l'application ainsi qu'un menu déroulant qui permet d'afficher les différentes pages associèes.
Une partie dédiée aux citations où s'affiche de manière aléatoire une citation contenue dans la base de donnée. Pour afficher une citation on utilise une requête AJAX appelant l'API avis de type GET.

#### Footer

Le footer contient les informations permettant de contacter les personnes gérant le site web.

##### Contenue page

###### Page d'accueil

Sur la page d'acceuil les avis s'affichent et peuvent être défilés en cliquant sur des flèches. 
Pour afficher un avis on utilise une requête AJAX appelant l'API avis de type GET qui permet d'obtenir tous les avis.
Une partie "à propos de nous" où on trouve les différentes informations sur les créateurs du site.

###### Page de connexion

Un form qui demande le login et le mot de passe afin de se connecter. Pour se connecter on utilise une requête AJAX appelant l'API Login 
Si la combinaison du login et du mont de passe n'est pas correct, un message d'erreur est affiché.

###### Page de création

Un form qui demande plusieure informations nécessaire à la création d'un compte (nom, prénom, login, date de naissance, mot de passe, sexe, niveau de sport). Pour créer un compte, on utilise une requête AJAX appelant l'API Login. 
Si la combinaison du login et du mont de passe n'est pas correct, un message d'erreur est affiché.

###### Page de compte

Sur la page, s'affiche un calendrier que l'on souhaite utiliser pour donner une représentation visuel à l'utilisateur de son alimentation. De plus, un menu déroulant permet d'afficher les repas de la journée, des 3,5 et 7 derniers jours. On indique également sur la page le nombre de calories qui reste à l'utilisateur pour qu'il obtienne tout les apports caloriques de la journée.Il y a également un espace prévue pour que l'utilisateur puisse mettre un avis et une note au site.
Pour afficher les repas on utilise une requête AJAX appelant l'API Calendeat avec la method GET. Pour les calories, on utilise l'API CalenditCalcul avec la method GET.
Pour créer les avis, on utilise l'API avis avec la method POST

###### Page de création de repas

Sur la page, plusieurs menus déroulants permettent de trier les différentes recettes contenu dans la base de données. Les recettes correspondant aux critères des menus déroulant s'affichent et on peut en clique dessus les ajouter dans un panier. En validant le panier on crée le repas.
Pour afficher les recettes, on utilise une requête AJAX pour appeler l'API recettes avec une method GET et pour créer les repas on appelle l'API calendeat avec la methode POST.

###### Page création de recettes

Sur la page, on peut donner un nom à la recette et mettre les différentes quantités de nutriments que cette recette apporte.
Pour créer cette recette, on appele l'API recettes avec la method POST.
