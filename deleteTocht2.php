<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Valentijn Standaart -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Delete tocht 2</title>
</head>
<body>
<main>
    <div>
        <h1>Delete tocht stap 2</h1>
        <p>
            Op tocht gegevens zoeken uit de tabel tochtne zodat ze verwijderd kunnen worden.
        </p>
        <?php
        // tochtid uit het formulier halen
        $tochtID = $_POST["tochtidvak"];

        // tocht gegevens uit de tabel halen
        require_once "tocht.php";
        
        $tocht = new Tocht();
        $tocht->searchTochtID($tochtID);
        $tocht->afdrukkenTocht();

        echo "<form action='deleteTocht3.php' method='post'>";
        // tochtid mag niet meer gewijzigd worden
        echo "<input type='hidden' name='tochtidvak' value='$tochtID>";
        // Waarde 0 doorgegeven als er niet gecheckt wordt
        echo "<input type='hidden' name='verwijdervak' value='0'>";
        echo "<input type='checkbox' name='verwijdervak' value='1'>";
        echo "Verwijder Tocht. <br><br>";
        echo "<input type='submit'>";
        echo "</form>";
        ?>
    </div>
    
</main>
</body>
</html>