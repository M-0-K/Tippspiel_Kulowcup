<main>


    <div class="container">

        <div class=heading>
            <h2 style="text-align: center;">Registrierung</h2>
        </div>

        <form id="loginForm" action='user_eintrag.php' method='POST' style="text-align: center;" >
            <input type='text' class='formulare' name='uname' placeholder='Benutzername' autocomplete='off' pattern="[a-zA-Z0-9]*" title="Der Benutzername darf nur Buchstaben und Zahlen beinhalten"> <br>
            <input type='password' class='formulare' name='pw' placeholder='Passwort' autocomplete='off'> <br>
            <input type='password' class='formulare' name='pw2' placeholder='Passwort wiederhohlen' autocomplete='off'> <br>

            <input class="register" type="submit" id="registerButton" name="registrieren" value="registrieren">
        </form>
    </div>
</main>
<script>
   /* $(document).ready(function() {
        document.getElementById("registerButton").addEventListener("click", function() {
            $('#registerButton').val("Dateien werden überprüft");
            let pw1 = $('input[name=pw]').val();
            let pw2 = $('input[name=pw2]').val();
            if (pw1.length > 3 && pw1 === pw2) {
                document.getElementById("loginForm").submit();
                $('#registerButton').val('registrieren');
            } else if (pw1.length <= 3 ){
                alert('Passwort ist zu Kurz. Das Passwort muss mindestens 4 Zeichen lang sein.');
            } else{
                alert('Passwörter stimmen nicht überein!');
            }
            
        })
    })*/
</script>