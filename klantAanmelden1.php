<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Maak uw account aan</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div>
            <h1>Vul uw gegevens in</h1>
            <form action="klantAanmelden2.php" method="post">
                Naam: <input type="text" name="naamvak" required><br>
                Email: <input type="email" name="emailvak" required><br>
                Telefoon Nr.: <input type="number" name="telefoonvak" maxlength="10" required><br>
                Wachtwoord: <input type="password" name="wachtwoordvak" required><br>
                <input type="submit">
            </form>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>