<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!--Prisijungimo forma-->
        <h2>Prisijungimas</h2>
        <form action="log.php" method="POST">
            Vartotojo ID: <input type="text" name="ID" placeholder="Jūsų vartotojo ID" required><br>
            Slaptažodis: <input type="password" name="pass" placeholder="Įveskite slaptažodį" required><br>
            <input type="hidden" name="act" value="act">
            <button type="submit" name="login">Prisijungti</button>
    </body>
</html>
