<?php
    if (isset($_POST["DateReq"]) && isset($_POST["DateOfFishing"]) && isset($_POST["Permission"]) && isset($_POST["PersonID"]) && isset($_POST["PlaceID"])){

        $dateReq = $_POST["DateReq"];
        $dateOfFishing = $_POST["DateOfFishing"];
        $permission = boolval($_POST["Permission"]);
        $personID = intval($_POST["PersonID"]);
        $placeID = intval($_POST["PlaceID"]);

        try {
            $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");
            $sql = "INSERT INTO requests (DateReq, DateOfFishing, Permission, PersonID, PlaceID)
            VALUES('$dateReq', '$dateOfFishing', '$permission', '$personID', '$placeID')";

            $conn->exec($sql);
            
            print "<h3>Заявка успешно добавлена<h3>";

        }
        catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
?>