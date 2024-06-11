<main>


    <div class="container">

        <div class=heading>
            <h2 style="text-align: center;">Registrierung</h2>
        </div>

        <form id="o" action='?register=1' method='POST' style="text-align: center;" >
            <input type='text' class='formulare' name='uname' placeholder='Benutzername' autocomplete='off' <?= isset($usrName)?"value=\"$usrName\"" : "" ?> pattern="[a-zA-Z0-9]*" title="Der Benutzername darf nur Buchstaben und Zahlen beinhalten"> <br>
            <p><?= isset($ErrorUSR)?$ErrorUSR : "" ?></p>
            <input type='password' class='formulare' name='pw' placeholder='Passwort' autocomplete='off' pattern=".{4,}"> <br>
            <input type='password' class='formulare' name='pw2' placeholder='Passwort wiederhohlen' autocomplete='off' pattern=".{4,}"> <br>
            <p><?= isset($ErrorPWD)?$ErrorPWD : "" ?></p>

            <input class="register" type="submit" id="registerButton" name="registrieren" value="Registrieren">
        </form>
    </div>
</main>