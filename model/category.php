<?php
    function getAllCategory(){
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM categories");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
?>