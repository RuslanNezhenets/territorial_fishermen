<?php
    try {
        $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

        $date = $_POST["Date"];

        $sql = "SELECT allowedplace.PlaceName, adminbody.AdminBodyName, adminbody.Province, temp.ID, temp.DateReq, temp.DateOfFishing, temp.Permission, temp.PersonName, temp.SurName
                FROM allowedplace
                LEFT JOIN (SELECT requests.ID, requests.DateReq, requests.DateOfFishing, requests.Permission, people.PersonName, people.SurName, requests.PlaceID 
                    FROM requests
                    INNER JOIN people ON requests.PersonID = people.ID
                    WHERE requests.DateOfFishing = '". $date ."' && requests.Permission = '1') AS temp ON allowedplace.ID = temp.PlaceID
                LEFT JOIN adminbody ON allowedplace.AdminBodyID = adminbody.ID
        ";

        $result = $conn->query($sql);

        echo "<table>
                <tr>
                    <th>Название места</th>
                    <th>Название администрации</th>
                    <th>Провинция</th>
                    <th>Номер заявки</th>
                    <th>Дата подачи заявки</th>
                    <th>Дата рыбалки</th>
                    <th>Разрешение</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                </tr>";
                while($row = $result->fetch()){
                    echo "<tr>";
                        echo "<td>" . $row["PlaceName"] . "</td>";
                        echo "<td>" . $row["AdminBodyName"] . "</td>";
                        echo "<td>" . $row["Province"] . "</td>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["DateReq"] . "</td>";
                        echo "<td>" . $row["DateOfFishing"] . "</td>";
                        echo "<td>" . (isset($row['Permission']) ? (boolval($row['Permission']) ? 'Есть' : 'Нету') : "") . "</td>";
                        echo "<td>" . $row["PersonName"] . "</td>";
                        echo "<td>" . $row["SurName"] . "</td>";
                    echo "</tr>";
                }
        echo "</table>";
        $conn = null; 
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
?>