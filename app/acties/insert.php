<?php
$sql = "INSERT INTO reis (column1, column2) VALUES (:value1, :value2)";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();