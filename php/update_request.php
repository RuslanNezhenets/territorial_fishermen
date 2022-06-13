<?php
    if (isset($_POST["ID"]) && isset($_POST["DateOfFishing"]) && isset($_POST["Permission"]) && isset($_POST["PersonID"]) && isset($_POST["PlaceID"])){

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

        $id = $_POST["ID"];
        $dateReq = $_POST["DateReq"];
        $dateOfFishing = $_POST["DateOfFishing"];
        $permission = boolval($_POST["Permission"]);
        $personID = intval($_POST["PersonID"]);
        $placeID = intval($_POST["PlaceID"]);

        try {
            $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");
            $sql = "UPDATE requests
            SET requests.DateReq = '".$dateReq."', requests.DateOfFishing = '".$dateOfFishing."', requests.Permission = '".$permission."', requests.PersonID = '".$personID."', requests.PlaceID = '".$placeID."'
            WHERE requests.ID = $id;";

            $conn->exec($sql);

            print "<h3>Редактирование успешно завершено<h3>";

        }
        catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
?>