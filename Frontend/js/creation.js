$(document).ready(function() {
    $('#inputPwd, #inputPwd2').on('keyup', function(e) {

        if($('#inputPwd').val() != '' && $('#inputPwd2').val() != '' && $('#inputPwd').val() != $('#inputPwd2').val()){
            $('#passwordStrength').removeClass().addClass('alert alert-error').html('Passwords do not match!');
            return false;
        }

        // Doit contenir des majuscules, des chiffres et des minuscules
        let strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");

        // Doit contenir soit des majuscules et des minuscules soit des minuscules et des chiffres
        let mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");

        // Doit faire au minimum six caractères
        let okRegex = new RegExp("(?=.{12,}).*", "g");

        if (okRegex.test($(this).val()) === false) {
            // If ok regex doesn't match the password
            $('#passwordStrength').removeClass().addClass('alert alert-error').html('Le mot de passe doit contenir au moins 12');

        } else if (strongRegex.test($(this).val())) {
            // If reg ex matches strong password
            $('#passwordStrength').removeClass().addClass('alert alert-success').html('Mot de passe valide');
        } else if (mediumRegex.test($(this).val())) {
            // If medium password matches the reg ex
            $('#passwordStrength').removeClass().addClass('alert alert-info').html('Renforcez votre mot de passe avec des caractères spéciaux');
        } else {
            // If password is ok
            $('#passwordStrength').removeClass().addClass('alert alert-error').html('Mot de passe faible : rajouter des majuscule');
        }

        return true;
    });
});

function containsSpecialCharacter(str) {
    // Regex pour les caractères spéciaux
    const specialCharRegex = /[@]/;

    // Teste si un caractère spécial est présent
    return specialCharRegex.test(str);
}

    $(document).ready(function(){
        console.log("Hello");
        
        $('#créationCompte').submit(function(event){
            event.preventDefault();
            const yearBirth = ($("#inputDate").val()).substring(0, 4);
            const currentDate = new Date();
            const year = currentDate.getFullYear();
            if ($("#inputPwd").val()!=$("#inputPwd2").val()){
                $('#texte').empty;
                $('#texte').append('<p>Les deux mots de passes ne sont pas les mêmes</p>')
            }
            if (containsSpecialCharacter($("#inputEmail").val())===false) {
                $("#verifEmail").append('<p>Veuillez mettre une adresse correcte</p>');
            }
            if(yearBirth < year -200 || yearBirth > year - 15 || $("#inputDate").val()>currentDate){
                $('#texte').empty;
                $('#texte').append('<p>Veulliez rentrer une date de naissance valide</p>');
            }
            if(Number($("#inputSexe").val())===0){
                $('#texte').empty;
                $('#texte').append('<p>Veulliez selectioner un valeur pour le champ "Sexe"</p>');
            }
            if(Number($("#inputSport").val())===0){
                $('#texte').empty;
                $('#texte').append('<p>Veulliez selectioner un valeur pour le champ "Sport"</p>');
            }
            else{
                // Hachage du mot de passe avec MD5
                const pwd = $("#inputPwd2").val();
                const pwdMD5 = CryptoJS.MD5(pwd).toString();
                const year= ($("#inputDate").val()).substring(0, 4);

                $.ajax({ 
                    url: "../backend/LoginAPI.php",
                    method: "POST",
                    dataType : "json",
                    data: JSON.stringify({
                        sexe : $("#inputSexe").val(),
                        sport : $("#inputSport").val(),
                        name : $("#inputNom").val(),
                        prenom : $("#inputPrenom").val(),
                        Login: $("#inputLogin").val(),
                        year : $("#inputDate").val(),
                        email : $("#inputEmail").val(),
                        password : pwdMD5
                    }),

                    success: function(response) {
                        if (response=== 201) {
                            window.location.href='pageCompteCree.php';
                        } else if (response === 409) {
                            $('#texte').append('<p>Cet email est associé à un compte existant</p>')
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Erreur lors de la requête AJAX : " + error);
                    }
                })
            }
            
        }) 
    });