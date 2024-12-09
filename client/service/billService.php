<?php

    function create_bill_payment(){
        $conn = connect();

        $userId = $_SESSION['idUser'];

        $stmt = $conn->prepare("INSERT INTO bill (created_date, user_id, totalAmount) 
                                VALUES (NOW(), :user_id, 0)");  // totalAmount tạm thời là 0
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $billId = $conn->lastInsertId();



        foreach ($_SESSION['cart'] as $cartId => $product) {
            $productId = $product['product_id'];
            $productPrice = $product['product_price'];
            $sizeId = $product['size_id'];
            $quantity = $product['quantity'];

            // Thêm chi tiết bill vào bảng bill_detail
            $stmt = $conn->prepare("INSERT INTO bill_detail (bill_id, product_id, price, size_id, amount) 
                                    VALUES (:bill_id, :product_id, :price, :size_id, :amount)");
            $stmt->bindParam(':bill_id', $billId, PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':price', $productPrice, PDO::PARAM_INT);
            $stmt->bindParam(':size_id', $sizeId, PDO::PARAM_INT);
            $stmt->bindParam(':amount', $quantity, PDO::PARAM_INT);
            $stmt->execute();
        }


        // Tính tổng số tiền từ các bill_detail
        $stmt = $conn->prepare("SELECT SUM(amount * price) as total FROM bill_detail WHERE bill_id = :bill_id");
        $stmt->bindParam(':bill_id', $billId, PDO::PARAM_INT);
        $stmt->execute();
        $totalAmount = $stmt->fetchColumn();  // Lấy tổng tiền từ bill_detail

        // Cập nhật lại totalAmount trong bảng bill
        $stmt = $conn->prepare("UPDATE bill SET totalAmount = :totalAmount WHERE id = :bill_id");
        $stmt->bindParam(':totalAmount', $totalAmount, PDO::PARAM_INT);
        $stmt->bindParam(':bill_id', $billId, PDO::PARAM_INT);
        $stmt->execute();

        unset($_SESSION['cart']);
        header('location: /fashion-shop-asm/index.php?act=bill-view');

        
    } 

?>