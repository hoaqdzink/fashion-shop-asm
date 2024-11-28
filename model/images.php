<?php
    function insertProductSubImage($product_id, $urls) {
        try {
            $conn = connect();
            $sql = "INSERT INTO images (urlImg, product_id) VALUES (:urls, :product_id)";
            $stmt = $conn->prepare($sql);
            
            // Gán giá trị cho các tham số trong câu lệnh SQL
            $stmt->bindParam(':urls', $urls);
            $stmt->bindParam(':product_id', $product_id);
    
            // Thực thi câu lệnh
            $stmt->execute();
        } catch (Exception $e) {
            echo "Lỗi khi thêm ảnh phụ: " . $e->getMessage();
        }
    }

    function getImagesbyProductId($idProduct){
        $conn = connect();
        $stmt = $conn->prepare("SELECT  * from images WHERE product_id = :idProduct");
        $stmt->bindParam(':idProduct', $idProduct, PDO::PARAM_INT);
        $stmt->execute();
        
        // Lấy tất cả kết quả và trả về dưới dạng mảng
        $productSize = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $productSize;
    }
    
?>