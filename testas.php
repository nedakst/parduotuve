<?php
$cookie_name = "loggedin";
// Patikrina ar vartotojas prisijungęs pagal Cookie reikšmę
if (isset($_COOKIE[$cookie_name])) {
    $cookie_value = $_COOKIE[$cookie_name];
    ?>
    <!doctype html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>1 klausimas</title>
        </head>
        <body>
            <?php
            session_start();
            ?>
            <p>1 Klausimas</p>
            <p>Kaip įvertintumėte puslapio funkcionalumą? (1 - labai blogai | 5 - labai gerai)</p>
            <form action="task2.php" method="post">
                <input type="number" name="answer1" min="1" max="5" required="required">
                <input type="submit">
            </form>
        </body>
    </html>
    <?php
} else {
    echo "Jūs esate neprisijungęs. <br>";
}
?>         