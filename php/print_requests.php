<?php
    try {
        $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

        $sql = "SELECT *
        FROM requests;";

        $result = $conn->query($sql);


        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Дата подачи заявки</th>
                    <th>Дата рыбалки</th>
                    <th>Разрешение</th>
                    <th>ID человека</th>
                    <th>ID места</th>
                </tr>";
                while($row = $result->fetch()){
                    echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["DateReq"] . "</td>";
                        echo "<td>" . $row["DateOfFishing"] . "</td>";
                        echo "<td>" . $row["Permission"] . "</td>";
                        echo "<td>" . $row["PersonID"] . "</td>";
                        echo "<td>" . $row["PlaceID"] . "</td>";
                        echo "<td>
                            <input type='submit' class='update-btn update_request' int='". $row["ID"] ."' value='Изменить'>
                            </td>";
                        echo "<td>
                            <input type='submit' class='delete-btn delete_request' int='". $row["ID"] ."' value='Удалить'>
                            </td>";
                    echo "</tr>";
                }
        echo "</table>";
        $conn = null; 
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
?>