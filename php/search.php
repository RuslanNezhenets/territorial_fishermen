<?php
    try {
        $conn = new PDO("mysql:host=localhost;  dbname=railway traffic schedule", "Ruslan", "123456");

        $inputSearch = $_POST["search__station"];

        $sql = "SELECT train.TrainNumber,
        (SELECT station.Name FROM station WHERE train.StartStation_id = station.id) as StartStation,
        (SELECT station.Name FROM station WHERE train.EndStation_id = station.id) as EndStation,
        timetable.ArrivalTime, timetable.DepartureTime, timetable.TrackNumber, timetable.Period
        FROM timetable
        JOIN train ON timetable.Train_id = train.Id 
        WHERE (SELECT station.Name FROM station WHERE train.StartStation_id = station.id) LIKE '%$inputSearch%'
        OR (SELECT station.Name FROM station WHERE train.EndStation_id = station.id) LIKE '%$inputSearch%'
        ";

        $result = $conn->query($sql);

        echo "<table>
                <tr>
                    <th>№ транспорта</th>
                    <th>Стартовая станция</th>
                    <th>Конечная станция</th>
                    <th>Время прибытия</th>
                    <th>Время отправления</th>
                    <th>Номер колии</th>
                    <th>Приметка</th>
                </tr>";
                while($row = $result->fetch()){
                    echo "<tr>";
                        echo "<td>" . $row["TrainNumber"] . "</td>";
                        echo "<td>" . $row["StartStation"] . "</td>";
                        echo "<td>" . $row["EndStation"] . "</td>";
                        echo "<td>" . $row["ArrivalTime"] . "</td>";
                        echo "<td>" . $row["DepartureTime"] . "</td>";
                        echo "<td>" . $row["TrackNumber"] . "</td>";
                        echo "<td>" . $row["Period"] . "</td>";
                    echo "</tr>";
                }
        echo "</table>";
        
        $conn = null; 
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
?>