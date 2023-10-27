<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Inloggen</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div>
            <h2>Mijn Donkey Travel Login</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                Naam: <br>
                <input type="text" name="naam" placeholder="Naam" required><br>
                Wachtwoord: <br>
                <input type="password" name="wachtwoord" placeholder="Wachtwoord" required><br>
                <input type="submit">
            </form>
            <p>
                Nog geen account? Dan kan je een <a href="includes/klanten/klantAanmelden1.php">Account aanmaken</a>.
            </p>

            <?php
            require "includes/classes/klant.php";

            if(!empty($_POST["naam"]) || !empty($_POST["wachtwoord"])){
                $_SESSION["naam"] = $_POST["naam"];
                $klantWachtwoord = $_POST["wachtwoord"];

                $check = new Klant($_SESSION["naam"], $klantWachtwoord);
                $check->logInCheckKlant($_SESSION["naam"], $klantWachtwoord);
            }

        ?>

        </div>


    </main>
    <footer>

    </footer>
</body>
</html>