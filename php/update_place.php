<?php
    if (isset($_POST["ID"]) && isset($_POST["PlaceName"]) && isset($_POST["AdminBodyID"])){

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

        $id = $_POST["ID"];
        $placeName = $_POST["PlaceName"];
        $adminBodyID = intval($_POST["AdminBodyID"]);

        try {
            $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");
            $sql = "UPDATE allowedplace
            SET allowedplace.PlaceName = '".$placeName."', allowedplace.AdminBodyID = '".$adminBodyID."'
            WHERE allowedplace.ID = $id";

            $conn->exec($sql);

            print "<h3>Редактирование успешно завершено<h3>";

        }
        catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
?>