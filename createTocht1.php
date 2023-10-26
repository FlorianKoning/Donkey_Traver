<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create tocht stap 1</title>
    </head>
    <body>
        <main>
            <h1>Create tocht stap 1</h1>
            <p>
                Maak een tocht aan. Vul de gegevens van de tocht in.
            </p>
            <form action="createtocht2.php" method="post">
                Omschrijving:<input type="text" name="tochtomschrijvingvak"><br>
                Route:<input type="text" name="tochtroutevak"><br>
                Aantaldagen:<input type="text" name="routeaantaldagen"><br>
                <input type="submit">
            </form>
        </main>
    </body>
</html>