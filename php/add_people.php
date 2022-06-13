<?php
    if (isset($_POST["Name"]) && isset($_POST["Surname"])){

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

        $name = $_POST["Name"];
        $surname = $_POST["Surname"];

        try {
            $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");
            $sql = "INSERT INTO people (PersonName, SurName)
            VALUES('$name', '$surname')";

            $conn->exec($sql);

            print "<h3>Новый человек успешно добавлен<h3>";

        }
        catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
?>