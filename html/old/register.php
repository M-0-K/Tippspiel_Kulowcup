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
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: black;
        }

        input.formulare {
            margin: 10px 0;
            width: calc(100% - 20px);
            height: 40px;
            border-radius: 10px;
            padding: 0 10px;
            box-sizing: border-box;
        }

        input.register {
            width: 100%;
            height: 40px;
            margin: 10px 0;
            border-radius: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        input.register:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 10px;
            }

            input.formulare, input.register {
                width: calc(100% - 10px);
            }
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
                if (pw1.length > 7 && pw1 === pw2) {
                    document.getElementById("loginForm").submit();
                } else if (pw1.length <= 7 ){
                    alert('Passwort ist zu Kurz. Das Passwort muss mindestens 8 Zeichen lang sein.');
                } else{
                    alert('Passwörter stimmen nicht überein!');
                }
                $('#registerButton').val('registrieren');
            })
        })
    </script>
</body>

</html>