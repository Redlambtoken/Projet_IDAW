# Calend'eat

## Format du site 

7 pages :
    - Page d'accueil : pageAccueil.php
        * Page de connexion : PageConnexion.php
        * Page de création de compte : 
        * Page d'annonce du compte crée
    - Page d'Accueil du compte 
        * Page de création de recettes
        * Page de création de repas
    

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

Le footer contient les informations permettant de contacter les gens du site.

##### Contenue page

###### Page d'accueil

Sur la page d'acceuil les avis s'affichent et peuvent être défilés en cliquant sur des flèches. 
Pour afficher un avis on utilise une requête AJAX appelant l'API avis de type GET qui permet d'obtenir tous les avis.
Une partie "à propos de nous" où on trouve les différentes informations sur les créateurs du site.

###### Page de connexion

Un form qui demande le login et le mot de passe afin de se connecter. Pour se connecter on utilise une requête AJAX appelant l'API Login 
