<?php
    try {
        $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

        $sql = "SELECT *
        FROM adminbody;";

        $result = $conn->query($sql);


        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Провинция</th>
                </tr>";
                while($row = $result->fetch()){
                    echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["AdminBodyName"] . "</td>";
                        echo "<td>" . $row["Province"] . "</td>";
                        echo "<td>
                            <input type='submit' class='update-btn update_admin' int='". $row["ID"] ."' value='Изменить'>
                            </td>";
                        echo "<td>
                            <input type='submit' class='delete-btn delete_admin' int='". $row["ID"] ."' value='Удалить'>
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