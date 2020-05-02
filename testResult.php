<?php

include ('db.php');
session_start();
$cookie_name = "loggedin";
// Patikrina ar vartotojas prisijungęs pagal Cookie reikšmę
if (isset($_COOKIE[$cookie_name])) {
    $cookie_value = $_COOKIE[$cookie_name];


    $answer1 = $_SESSION['answer1'];
    $answer2 = $_SESSION['answer2'];
    $answer3 = $_SESSION['answer3'];
    $answer4 = $_SESSION['answer4'];
    $answer5 = $_POST['answer5'];
    $vidurkis = ($answer1 + $answer2 + $answer3 + $answer4 + $answer5) / 5;
    echo "Jusu vertinimas $vidurkis";

    $sql = "INSERT INTO vertinimas (vartotojo_id, vidurkis) VALUES ('$cookie_value', '$vidurkis')";
    $res = mysqli_query($db, $sql);
    if ($res == TRUE) {
        
    } else {
        printf("Įvyko klaida: %s\n", mysqli_error($db));
    }
    echo '<br><br><form action="vidus.php"><input type="submit" value="Grįžti į parduotuvę"></form>';
} else {
    echo "Jūs esate neprisijungęs. <br>";
}
?>     