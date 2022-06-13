<?php
    try {
        $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");

        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS'):

        $sql = "SELECT *
        FROM people;";

        $result = $conn->query($sql);


        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                </tr>";
                while($row = $result->fetch()){
                    echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["PersonName"] . "</td>";
                        echo "<td>" . $row["SurName"] . "</td>";
                        echo "<td>
                            <input type='submit' class='update-btn update_people' int='". $row["ID"] ."' value='Изменить'>
                            </td>";
                        echo "<td>
                            <input type='submit' class='delete-btn delete_people' int='". $row["ID"] ."' value='Удалить'>
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