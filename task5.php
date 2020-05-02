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
            <title>5 klausimas</title>
        </head>
        <body>
            <?php
            session_start();
            $answer4 = $_POST['answer4'];
            $_SESSION['answer4'] = $answer4;
            ?>
            <p>5 Klausimas</p>
            <p>Ar rekomenduotumėte šį puslapį draugams? (1 - visiškai nesutinku | 5 - visiškai sutinku)</p>
            <form action="testResult.php" method="post">
                <input type="number" name="answer5" min="1" max="5" required="required">
                <input type="submit">
            </form>
        </body>
    </html>
    <?php
} else {
    echo "Jūs esate neprisijungęs. <br>";
}
?>     