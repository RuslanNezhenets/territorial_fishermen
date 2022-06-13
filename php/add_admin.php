<?php
    if (isset($_POST["AdminBodyName"]) && isset($_POST["Province"])){

        $adminBodyName = $_POST["AdminBodyName"];
        $province = $_POST["Province"];

        try {
            $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");
            $sql = "INSERT INTO adminbody (AdminBodyName, Province)
            VALUES('$adminBodyName', '$province')";

            $conn->exec($sql);

            print "<h3>Новая администрация успешно добавлен<h3>";

        }
        catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
?>