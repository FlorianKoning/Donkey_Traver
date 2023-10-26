<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Valentijn Standaart -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Update Tocht stap 2</title>
</head>
<body>
    <main>
        <div>
            <h1 >Update Tocht stap 2</h1>
            <p>
                Dit formulier wordt gebruikt om gegevens te wijzigen
                van de Tocht in de tabel tochten.
            </p>
            <?php
            // id uit het formulier halen
            $tochtID = (int)$_POST["tochtidvak"];

            require_once "tocht.php";  

            $tocht = new Tocht();
            // Product gegevens uit  de tabel halen
            $prod->searchTochtRoute($tochtID);

            ?>
            
            <!-- Formulier voor nieuwe gegevens -->
            <form action="updateTocht3.php" method="post">
                tocht ID: <?php echo $prod->getprodID() ?><br>
                <input type="hidden" name="prodidvak" value="<?php echo $prod->getTochtID() ?>">
                Tocht omschrijving: <input type="text" name="tochtomschrijvingvak" value="<?php echo $tocht->getTochtOmschrijving()?>"><br>
                Tocht route: <input type="number" name="tochtroutevak" value="<?php echo $tocht->getTochtRoute()?>"><br>
                Tocht dagen: <input type="text" name="routeaantaldagen" value="<?php echo $tocht->getTochtDagen()?>"><br><br>
                <input type="submit">
            </form>
        </div>
        
    </main>
</body>
</html>