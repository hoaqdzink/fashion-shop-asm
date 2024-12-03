<?php 

    function getAllRole() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM roles");
        $stmt->execute(); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function deleteRole($id) {
        $conn = connect();
        $stmt = $conn->prepare("DELETE FROM roles WHERE role_id = :role_id");
        $stmt->bindParam(':role_id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
?>