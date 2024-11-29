<?php 

    function getAllRole() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM roles");
        $stmt->execute(); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
?>