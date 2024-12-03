<?php
    function getAllSize(){
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM sizes");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function deleteSize($id) {
        $conn = connect();
        $stmt = $conn->prepare("DELETE FROM sizes WHERE size_id = :size_id");
        $stmt->bindParam(':size_id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
?>