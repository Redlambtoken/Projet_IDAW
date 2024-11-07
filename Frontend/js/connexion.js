$(document).ready(function(){
    $('#login_form').submit(function(event){
        event.preventDefault();
        
        // Vérifier que les champs ne sont pas vides
        const login = $("#inputLogin").val();
        const pwd = $("#inputPwd").val();
        
        // Hachage du mot de passe avec MD5
        const pwdMD5 = CryptoJS.MD5(pwd).toString();

        // Envoi de la requête AJAX
        $.ajax({ 
            url: "../backend/LoginAPI.php",
            method: "POST",
            dataType: "json",
            contentType : "application/json",
            data: JSON.stringify({
                login: login,
                password: pwdMD5
            }),
            success: function(response) {
                if (response === 200) {
                    window.location.href = 'pageCompte.php';
                } else if (response === 400) {
                    $("#text").empty;
                    $("#text").append('<p>Login ou mot de passe nnon valide</p>')
                }
            },
            error: function() {
                $("#text").empty;
                $("#text").append("Une erreur est survenue lors de la connexion. Veuillez réessayer.");
            }
        });
    });
});