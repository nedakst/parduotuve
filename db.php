        <?php
        // Prisijungimas prie duomenų bazės
        $db = mysqli_connect("localhost", "root", "", "parduotuve");
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        ?>
