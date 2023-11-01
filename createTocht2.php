<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Valentijn Standaart -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Create tocht stap 2</title>
</head>
    <body>
        <main>
            <h1>Create tocht stap 2</h1>
            <p>
                Het toevoegen van een tocht in de tabel tochten.
            </p>
            <?php
            require "tocht.php";

            $tochtID = NULL;
            $tochtOmschrijving = $_POST ["tochtomschrijvingvak"];
            $tochtRoute = $_POST ["tochtroutevak"];
            $tochtAantaldagen = $_POST ["routeaantaldagen"];

            // Tocht gegevens invoeren
            $tocht = new Tocht($tochtOmschrijving, $tochtRoute, $tochtAantaldagen);
            
            // Tocht in de database zetten
            $tocht->createTocht();
            echo "<p>De tocht is toegevoegd</p><br>";
            echo "<button><a> Terug naar het menu</a></button>"
            ?>
        </main>
    </body>
</html>