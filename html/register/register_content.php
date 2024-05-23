<main style="display: flex;justify-content: center;">


    <div class="container">

        <div class=heading>
            <h2 style="text-align: center;">Registrierung</h2>
        </div>

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