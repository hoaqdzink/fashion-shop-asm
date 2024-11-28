<?php
    function getAllColors() {

        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM colors");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
?>