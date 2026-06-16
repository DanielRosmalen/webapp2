 <?php
 $sql = "SELECT r.* FROM reis r ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
