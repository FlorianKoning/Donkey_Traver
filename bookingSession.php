<!-- florian koning -->
<!-- stopt alles van de post in een session en stuurt je door naar bookingverwerk.php -->
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // kijkt of er een $_POST verzoek is voor selectroute
    if (isset($_POST["selectRoute"])) {
        $_SESSION['selectRoute'] = $_POST["selectRoute"];
    } else {
        echo "je hebt geen route gekozen!";
    }

    // kijkt of er een $_POST verzoek is voor startdatum
    if (isset($_POST["startDatum"])) {
        $_SESSION['startDatum'] = $_POST["startDatum"];
    } else {
        echo "je hebt geen datum gekozen!";
    }
} else {
    echo "we hebben geen formulier ontvangen.";
}

if ($_SESSION['selectRoute'] && $_SESSION['startDatum']) {
    header("Location: http://localhost/Donkey_travel/bookingVerwerk.php");
} else {
    echo "er is iets fout gegaan, probeer het nog een keer.";
}
