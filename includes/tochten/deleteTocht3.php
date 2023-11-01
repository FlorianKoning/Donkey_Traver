<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Valentijn Standaart -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Delete tocht 3</title>
</head>
<body>
<main>
    <div>
        <h1>Delete tocht stap 3</h1>
        <p>
            Op tocht gegevens zoeken uit de tabel tochten zodat ze verwijderd kunnen worden.
        </p>
        <?php 
        // gegevens uit het formulier halen
        $tochtID = (int)$_POST["tochtidvak"];
        $verwijderen = $_POST["verwijdervak"];

        // product gegevens verwijderen
        if ($verwijderen === "1"){
            require "../classes/tocht.php";
            $tocht = new Tocht();
            $tocht->deleteTocht($tochtID);
            echo "<p>De gegevens zijn verwijderd. <br /></p>";

        } else{
            echo "<p>De gegevens zijn niet verwijderd. <br /></p>";
        }

        echo "<br>";
        echo "<button><a href='../../homePagina.php'>Terug</a></button>";
        ?>
    </div>
    
</main>
</body>
</html>