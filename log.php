<?php
// Vartotojo iš duomenų bazės prisijungimas
include ('db.php');
$cookie_name = "loggedin";

if (isset($_POST['act'])) {
    $ID = $_POST['ID'];
    $pass = $_POST['pass'];

    // ID ir slaptažodžio sutapimo patikrinimas
    $sql = "SELECT * FROM vartotojai WHERE ID ='$ID' AND slaptazodis='$pass'";

    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $cookie_value = $ID;
        setcookie($cookie_name, $cookie_value, time() + 60 * 60 * 4); // slapuko sudarymas 4val.
        header("location:vidus.php");
    } else {
        echo "Neteisingi prisijungimo duomenys <br>";
        echo "Norėdami tęsti prisijunkite čia: <br>";
        echo '<a href ="sistema.php">Prisijungti</a>';
    }
}
?>