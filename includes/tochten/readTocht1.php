<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Valentijn Standaart -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Read tocht</title>
</head>
<body>
    <main>
        <div>
            <h1>Read Tocht</h1>
            <p>
                Lijst van tochten.
            </p>

            <?php
            require "../classes/tocht.php";

            echo "<button><a href='../../homePagina.php'> Terug naar het menu </a></button>";

            $tocht = new Tocht();
            $tocht->readTocht();
            
            ?>
        </div>
    </main>
</body>
</html>