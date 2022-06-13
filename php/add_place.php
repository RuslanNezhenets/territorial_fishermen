<?php
    if (isset($_POST["PlaceName"]) && isset($_POST["AdminBodyID"])){

        $placeName = $_POST["PlaceName"];
        $adminBodyID = intval($_POST["AdminBodyID"]);

        try {
            $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");
            $sql = "INSERT INTO allowedplace (PlaceName, AdminBodyID)
            VALUES('$placeName', '$adminBodyID')";

            $conn->exec($sql);
            
            print "<h3>Новое место успешно добавлено<h3>";

        }
        catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
?>