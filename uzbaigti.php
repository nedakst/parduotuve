<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include ('db.php');
        include ('prekes.php');

        if (isset($_POST['end'])) {
            $cookie_name = "loggedin";
// Patikrina ar vartotojas prisijungęs pagal Cookie reikšmę
            if (isset($_COOKIE[$cookie_name])) {
                $cookie_value = $_COOKIE[$cookie_name];
                echo "Jūsų užsakymas pateiktas<br>";
                echo "Žemiau matote savo prekių sąrašą:<br>";
            } else {
                echo "Jūs esate neprisijungęs. <br>";
            }
// Iš duomenų bazės paima pasirinktų prekių sąrašą
            $sql = "SELECT prekes FROM cart_userid WHERE vartotojo_id='$cookie_value'";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
// Išspausdinamas prekių sąrašas
                while ($row = mysqli_fetch_array($result)) {
                    echo $row['prekes'] . "<br>";
                }
                echo "<br>Norite pradėti naują apsipirkimą?";
                ?>
                <form action="vidus.php"  method="POST">
                    <input type="submit" name="new" value="Naujas apsipirkimas">
                </form>
                <?php
            }
        }
        ?>
    </body>
</html>
