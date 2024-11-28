<?php
    function getAllSize(){
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM sizes");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

?>