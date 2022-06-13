<?php
    if (isset($_POST["ID"])){

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

        $id = $_POST["ID"];

        try {
            $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");
            $sql = "DELETE FROM adminbody WHERE adminbody.ID = $id";

            $conn->exec($sql);
        }
        catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
?>