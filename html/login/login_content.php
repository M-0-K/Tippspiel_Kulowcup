<main>
    <div class="container">
        <h2>Anmeldung</h2>
        <br>
        <form action="?login=1" method="POST" id="loginform" name="loginFormular">
            <input class='formulare' type="text" name="username" id="username" placeholder="Benutzername" autofocus required><br>
            <input class='formulare' type="password" name="pw" id="passwort" placeholder="Passwort" required>
            <p><?= isset($ErrorMSG)?$ErrorMSG : "" ?></p>
            <input class='register' type="submit" name="login" value="Login">
        </form>
        <br>
        <p>Noch nicht angemeldet? <a href="../register/register.php">Registrierung</a>
        <br>
        <br>
        Bitte beachte, dass du deinen Account erst am Ausschank freischalten lassen musst, bevor du dich hier anmelden kannst!
        </p>
        <?php
        error_reporting(0);
        if (isset($errorMessage)) {
            echo "<p>$errorMessage</p>";
        }
        ?>
    </div>
</main>