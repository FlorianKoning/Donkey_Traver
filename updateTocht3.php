<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Valentijn Standaart -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Update Tocht stap 3</title>
</head>
<body>
    <main>
        <div>
            <h1>Pas een Tocht aan stap 3</h1>
            <?php
            // tochtgegevens uit het formulier halen
            $tochtID = $_POST["tochtidvak"];
            $tochtOmschrijving = $_POST["tochtomschrijvingvak"];
            $tochtRoute = $_POST["tochtroutevak"];
            $tochtAantaldagen = $_POST["routeaantaldagen"];

            require "tocht.php";

            $tocht = new Tocht($tochtOmschrijving, $tochtRoute, $tochtAantaldagen, $tochtID);
            // Update de gegevens in tabel tochten waar hetzelfde tocht id is
            $tocht->updateTocht($tochtID);
            $tocht->afdrukkenTocht();

            echo "<br>";
            echo "<button class='backtohome'><a href='index.php'> Terug naar het menu </a></button>";
            ?>
        </div>

    </main>
</body>
</html>