<?php
    if (isset($_POST["ID"]) && isset($_POST["AdminBodyName"]) && isset($_POST["Province"])){

        $id = $_POST["ID"];
        $adminBodyName = $_POST["AdminBodyName"];
        $province = $_POST["Province"];

        try {
            $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");
            $sql = "UPDATE adminbody
            SET adminbody.AdminBodyName = '".$adminBodyName."', adminbody.Province = '".$province."'
            WHERE adminbody.ID = $id";

            $conn->exec($sql);

            print "<h3>Редактирование успешно завершено<h3>";

        }
        catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
?>