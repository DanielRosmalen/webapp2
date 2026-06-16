<?php
$sql = "UPDATE r.* SET reis r ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
