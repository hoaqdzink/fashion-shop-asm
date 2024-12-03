<?php
    function getAllCategory(){
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM categories");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function deleteCategory($id) {
        $conn = connect();
        $stmt = $conn->prepare("DELETE FROM categories WHERE category_id = :category_id");
        $stmt->bindParam(':category_id', $id, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }
?>