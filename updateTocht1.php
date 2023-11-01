<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Valentijn Standaart -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Update Tocht stap 1</title>
</head>
<body>
    <main>
        <div>
            <h1>Update tocht stap 1</h1>
            <p>
                Dit formulier wordt gebruikt om de gegevens te wijzigen in de tabel tochten.
            </p>
            <form action="updateTocht2.php" method="post">
                Welk Tocht ID wilt u wijzigen?
                <input type="number" name="tochtidvak"> <br>
                <input type="submit">
            </form>
        </div>
    </main>
</body>
</html>