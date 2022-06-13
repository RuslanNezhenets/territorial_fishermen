<?php
    try {
        $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");

        $sql = "SELECT requests.ID, people.PersonName, people.Surname, requests.DateReq, requests.DateOfFishing, requests.Permission,
        allowedplace.PlaceName, adminbody.AdminBodyName, adminbody.Province
        FROM requests
        JOIN people ON people.ID = requests.PersonID
        JOIN allowedplace ON requests.PlaceID = allowedplace.ID
        JOIN adminbody ON allowedplace.AdminBodyID = adminbody.ID
        ORDER BY requests.ID;";

        $result = $conn->query($sql);


        echo "<table>
                <tr>
                    <th>Номер заявки</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Дата подачи заявки</th>
                    <th>Дата рыбалки</th>
                    <th>Разрешение</th>
                    <th>Название места</th>
                    <th>Название администрации</th>
                    <th>Провинция</th>
                </tr>";
                while($row = $result->fetch()){
                    echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["PersonName"] . "</td>";
                        echo "<td>" . $row["Surname"] . "</td>";
                        echo "<td>" . $row["DateReq"] . "</td>";
                        echo "<td>" . $row["DateOfFishing"] . "</td>";
                        echo "<td>" . $row["Permission"] . "</td>";
                        echo "<td>" . $row["PlaceName"] . "</td>";
                        echo "<td>" . $row["AdminBodyName"] . "</td>";
                        echo "<td>" . $row["Province"] . "</td>";
                    echo "</tr>";
                }
        echo "</table>";
        $conn = null; 
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
?>