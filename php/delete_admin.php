<?php
    if (isset($_POST["ID"])){

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