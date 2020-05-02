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
            <title>4 klausimas</title>
        </head>
        <body>
            <?php
            session_start();
            $answer3 = $_POST['answer3'];
            $_SESSION['answer3'] = $answer3;
            ?>
            <p>4 Klausimas</p>
            <p>Ar šis puslapis turi pakankamą prekių pasirinkimą? (1 - visiškai nesutinku  | 5 - visiškai sutinku)</p>
            <form action="task5.php" method="post">
                <input type="number" name="answer4" min="1" max="5" required="required">
                <input type="submit">
            </form>
        </body>
    </html>
    <?php
} else {
    echo "Jūs esate neprisijungęs. <br>";
}
?>     