<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Valentijn Standaart -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Delete tocht 1</title>
</head>
<body>
<main>
    <div>
        <h1>Delete tocht stap 1</h1>
        <p>
            Dit formulier zoekt een tocht op uit de tabel tochten om die te kunnen verwijderen.
        </p>
        <form action="deleteTocht2.php" method="post">
            Welke tocht wilt u verwijderen?
            <input type="number" name="tochtidvak"><br>
            <input type="submit">
        </form>
    </div>
    
</main>
</body>
</html>