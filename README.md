# Calend'eat

## Instalation and configuration

## API Utilisation

#### https://{URL_Front}/LoginAPI.php

##### GET :

Connection
With the HTTP method GET on https://{URL_Front}/LoginAPI.php you will need to add a json in the body to connect yourself to the website, a json like
```json
{
    "login":"toto",
    "password":"tata"
}
```
if the login or the password is missing, you will get a 400 HTTP Response
if the login or the password is incorrect, you will get a 404 HTTP Response 
if you succeed to connect yourself, you will get a 200 HTTP Response
after a connection a session will start to keep the login, name and ID of the user

##### POST

Create User
With the HTTP method POST on https://{URL_Front}/LoginAPI.php you will need a json to create a user, a json like :
```json
{
    "sexe": "2",
    "sport" : "2",
    "name" : "Toto",
    "prenom" : "Tata",
    "year" : "1983-04-30",
    "email" : "tata@gmail.com",
    "password" : "dsq"
}
```
Thank you to use the website instead of Postman or any else tool, it will be not working with a tool.
if a param is missing, you will get a 400 HTTP Response
if the email is already use, you will get a 409 HTTP Response 
if you succeed to create a user, you will get a 201 HTTP Response

##### PUT :

Connection
With the HTTP method PUT on https://{URL_Front}/LoginAPI.php you will need to add a json in the body to connect yourself to the website, a json like
```json
{
    "password":"tata"
}
```
if the login or the password is missing, you will get a 400 HTTP Response
if the login or the password is incorrect, you will get a 404 HTTP Response 
if you succeed to connect yourself, you will get a 200 HTTP Response


#### https://{URL_Front}/avisAPI.php

##### GET :

With the https://{URL_Front}/avisAPI.php you will get all the avis in the database

##### POST

Create Avis
With the HTTP method POST on https://{URL_Front}/avisAPI.php you will need a json to create and have a session open, the json will be like :
```json
{
    "Text" : "oihsqdfuihqsdfpuhqsdofuihqsfoiu",
    "nameAuteur" : "Dad"
}
```
If you don't put "Text" or "nameAuteur" you will get a 400 error bad request
If you create your avis correctly you will get a 201 HTTP Response

#### https://{URL_Front}/calendeatAPI.php

##### GET :

With the https://{URL_Front}/calendeatAPI.php you will need a session and you can get all of your "repas" from the database.
If use a query param "day" and a session you will get all of your repas from the last {days} (https://{URL_Front}/calendeatAPI.php?day={days}) 

##### POST

Create Avis
With the HTTP method POST on https://{URL_Front}/calendeatAPI.php you will need a json to create and have a session open, the json will be like :
```json
{
    "date" : "YYYY-mm-dd",
    "recettes" : [
        1,
        5,
        5
    ]
}
```
recettes -> ID of the recipe in your meal
If you don't put "recettes" you will get a 400 error bad request ("date" is facultative)
If you create your repas correctly you will get a 201 HTTP Response

#### https://{URL_Front}/recettesAPI.php

##### GET :

With the https://{URL_Front}/recettesAPI.php you will need a session and you will get all the recette and your personal recette

##### POST

Create Avis
With the HTTP method POST on https://{URL_Front}/recettesAPI.php you will need a json to create and have a session open, the json will be like :
```json
{
    "nameR" : "Raclette",
    "IDas" : [
        2,
        3,
        62
    ],
    "Qtes" : [
        2,
        15,
        91
    ],
    "IDCat" : 1,
    "IDSCat" : 2,
    "IDSSCat" : 3
}
```
If you don't put "nameR", "IDas", "Qtes" you will get a 400 error bad request (the others are facultatives)
nameR -> name of your "recette"
IDas -> list of the aliments in your "recette" (We need their ID)
Qtes -> quantity for each aliments
IDCat, IDSCat, IDSSCat -> ID of category
If you create your repas correctly you will get a 201 HTTP Response
