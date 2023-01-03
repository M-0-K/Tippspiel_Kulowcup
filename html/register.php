<?php
if (isset($_POST['submit'])) {
    print_r($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/index.css" rel="stylesheet">
    <title>Registrierung</title>
    <script src="../script/jquery-3.6.0.min.js" type="text/javascript"></script>
</head>

<style>
    input.formulare{
        margin: 5px;
        width: 250px;
        height: 30px;
        border-radius: 7px;
        
    }
</style>

<body>
    <header>
    <h2 style="text-align: center;">Registrierung</h2>
    </header>
    <main style="display: flex;justify-content: center;">

        <div class="contaienr">
            

            <form id="loginForm" action='user_eintrag.php' method='POST' style="text-align: center;" >
                <input type='text' class='formulare' name='uname' placeholder='Benutzername' autocomplete='off'> <br>
                <input type='password' class='formulare' name='pw' placeholder='Passwort' autocomplete='off'> <br>
                <input type='password' class='formulare' name='pw2' placeholder='Passwort wiederhohlen' autocomplete='off'> <br>
                
                <input class="register" type="submit" id="registerButton" name="registrieren" value="registrieren">
            </form>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            document.getElementById("registerButton").addEventListener("click", function() {
                $('#registerButton').val("Dateien werden überprüft");
                let pw1 = $('input[name=pw]').val();
                let pw2 = $('input[name=pw2]').val();
                if (pw1.length > 5 && pw1 === pw2) {
                    document.getElementById("loginForm").submit();
                } else {
                    alert('Passwörter stimmen nicht überein!');
                }
                $('#registerButton').val('registrieren');
            })
        })
    </script>
</body>

</html>