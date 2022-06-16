<?php
    if (isset($_POST["DateReq"]) && isset($_POST["DateOfFishing"]) && isset($_POST["Permission"]) && isset($_POST["PersonID"]) && isset($_POST["PlaceID"])){

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

        $dateReq = $_POST["DateReq"];
        $dateOfFishing = $_POST["DateOfFishing"];
        $permission = intval($_POST["Permission"]);
        $personID = intval($_POST["PersonID"]);
        $placeID = intval($_POST["PlaceID"]);

        try {
            $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");
            $sql = "INSERT INTO requests (DateReq, DateOfFishing, Permission, PersonID, PlaceID)
            VALUES('$dateReq', '$dateOfFishing', '$permission', '$personID', '$placeID')";

            $search = "SELECT * FROM requests WHERE DateOfFishing = '".$dateOfFishing."' && PlaceID = $placeID && Permission = 1";

            $result = $conn->query($search);

            if(!($result->fetch())){
                $sql = "INSERT INTO requests (DateReq, DateOfFishing, Permission, PersonID, PlaceID)
                VALUES('$dateReq', '$dateOfFishing', '$permission', '$personID', '$placeID')";
                $conn->exec($sql);
                print "<h3>Заявка успешно добавлена<h3>";
            }
            else{
                print "<h3>Данное место занято на эту дату<h3>";
            }

        }
        catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
?>