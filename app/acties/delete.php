<?php
$sql = "DELETE FROM r.* FROM reis r WHERE r.reisid = :reisid ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
