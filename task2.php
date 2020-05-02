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
            <title>2 klausimas</title>
        </head>
        <body>
            <?php
            session_start();
            $answer1 = $_POST['answer1'];
            $_SESSION['answer1'] = $answer1;
            ?>
            <p>2 Klausimas</p>
            <p>Kaip įvertintumėte prekių kokybę? (1 - labai blogai | 5 - labai gerai)</p>
            <form action="task3.php" method="post">
                <input type="number" name="answer2" min="1" max="5" required="required">
                <input type="submit">
            </form>
        </body>
    </html>
    <?php
} else {
    echo "Jūs esate neprisijungęs. <br>";
}
?>     