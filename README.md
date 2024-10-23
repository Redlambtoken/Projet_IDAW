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



#### https://{URL_Front}/avisAPI.php

##### GET :

With the https://{URL_Front}/avisAPI.php you will get all the avis in the database

##### POST

Create Avis
With the HTTP method POST on https://{URL_Front}/avisAPI.php you will need a json to create, a json like :
```json
{
    "Text" : "oihsqdfuihqsdfpuhqsdofuihqsfoiu",
    "nameAuteur" : "Dad"
}
```
If you don't put "Text" or "nameAuteur" you will get a 400 error bad request
If you create your avis correctly you will get a 201 HTTP Response