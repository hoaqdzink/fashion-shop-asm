<?php
    function insertProductSize($product_id, $size_id){
        try {
            $conn = connect();
            $sql = "INSERT INTO product_sizes (product_id, size_id) VALUES (:product_id, :size_id)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->bindParam(':size_id', $size_id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }


    function getProductSizeByIdProduct($idProduct) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT s.size_id, ps.product_id
                                FROM product_sizes ps
                                JOIN sizes s ON ps.size_id = s.size_id
                                WHERE ps.product_id = :idProduct");
        $stmt->bindParam(':idProduct', $idProduct, PDO::PARAM_INT);
        $stmt->execute();
        
        // Lấy tất cả kết quả và trả về dưới dạng mảng
        $productSize = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $productSize;
    }

    function deleteProductSizes($id){
        $conn = connect();
        $sql = "DELETE FROM product_sizes WHERE product_id = :product_id";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
    }
?>