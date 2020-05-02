<?php
include ('db.php');
include ('prekes.php');

$cookie_name = "loggedin";
if (isset($_COOKIE[$cookie_name])) {
    $cookie_value = $_COOKIE[$cookie_name];
    echo "Sėkmingai prisijungėte.";
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
                        
            <a href="testas.php">Pildyti testą</a>
            <h3>Prekių sąrašas</h3>
            <?php
            // Atspausdinamas prekių sąrašas iš masyvo 
            // Prie kiekvienos prekės pridedamas mygtukas 'pridėti', kuris įterpia prekę į duomenų bazę
            foreach ($prekes as $kategorijos => $kat_pav) {
                echo "<h4>$kategorijos</h4>";
                foreach ($kat_pav as $tipas => $tipo_pav) {
                    if (is_array($tipo_pav)) {
                        echo "<h5>$tipas</h5>";
                        foreach ($tipo_pav as $prekiu => $prekes) {
                            ?>
                            <form method="POST">
                                <?php echo $prekes; ?>
                                <input type="hidden" name="hidden-name" value="<?php echo $prekes; ?>">
                                <input type="submit" name="add" value="Pridėti">
                            </form>
                            <?php
                        }
                    } else {
                        ?>
                        <form method="POST"> 
                            <?php echo $tipo_pav; ?>
                            <input type="hidden" name="hidden-name" value=" <?php echo $tipo_pav; ?>">
                            <input type="submit" name="add" value="Pridėti">
                        </form>
                        <?php
                    }
                }
            }

            if (isset($_POST['add'])) {
                ?>
                <form action="uzbaigti.php" method="POST">
                    <input type="submit" name="end" value="Užbaigti apsipirkimą">
                </form>
                <?php
                // Paspaudus mygtuką 'Pridėti' prekė įrašoma į duomenų bazę
                $preke = $_POST['hidden-name'];
                $ord = "INSERT INTO cart_userid (vartotojo_id, prekes) VALUES ('$cookie_value', '$preke')";
                $res = mysqli_query($db, $ord);
                if ($res == TRUE) {
                    echo "Prekė įdėta į krepšelį";
                } else {
                    printf("Įvyko klaida: %s\n", mysqli_error($db));
                }
            }
            // Po krepšelio turinio paspaudus 'Naujas apsipirkimas' buvusį krepšelį ištrina iš duomenų bazės
            if (isset($_POST['new'])) {
                $dlt = "DELETE FROM cart_userid WHERE vartotojo_id='$cookie_value'";
                $res = mysqli_query($db, $dlt);
                if ($db->query($dlt) === TRUE) {
                    
                } else {
                    echo "Error deleting record: " . $db->error;
                }
            }
            ?>
        </body>
    </html>

    <?php
} else {
    echo "Jūs neprisijungęs, norėdami tęsti prisijungti galite čia: <br>";
    echo '<a href ="sistema.php">Prisijungti</a>';
}
?>
