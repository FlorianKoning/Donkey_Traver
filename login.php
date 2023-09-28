<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inloggen</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div>
            <h1>Login</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                Naam: <input type="text" name="naam"><br>
                Wachtwoord: <input type="password" name="wachtwoord"><br>
                <input type="submit">
            </form>
            <p>
                Nog geen account? Dan kan je <a href="klantAanmelden1.php">Aanmelden</a>.
            </p>

            <?php
            require "klant.php";

            if(empty($_POST["naam"]) && empty($_POST["wachtwoord"])){
                echo "Vul allebei de vakken in.";

            } elseif(!empty($_POST["naam"]) || !empty($_POST["wachtwoord"])){
                $klantNaam = $_POST["naam"];
                $klantWachtwoord = $_POST["wachtwoord"];

                $check = new Klant($klantNaam, $klantWachtwoord);
                $check->logInCheckKlant($klantNaam, $klantWachtwoord);
            }

        ?>

        </div>


    </main>
    <footer>

    </footer>
</body>
</html>