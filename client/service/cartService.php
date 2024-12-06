<?php

    if (isset($_POST['update_quantity'])) {
        session_start();
        
        $productId = $_POST['product_id'];
        $action = $_POST['action'];
        // var_dump($_SESSION['cart']);
        if (isset($_SESSION['cart'][$productId])) {
            $currentQuantity = $_SESSION['cart'][$productId]['quantity'];
            if ($action == 'increase') {
                $_SESSION['cart'][$productId]['quantity'] = $currentQuantity + 1;
            } elseif ($action == 'decrease' && $currentQuantity > 1) {
                $_SESSION['cart'][$productId]['quantity'] = $currentQuantity - 1;
            }
    
            // Trả về phản hồi JSON
            echo json_encode([
                'success' => true,
                'new_total' => number_format(($_SESSION['cart'][$productId]['quantity'] * $_SESSION['cart'][$productId]['product_price']), 0, ',', '.').' VNĐ',
                'new_quantity' => $_SESSION['cart'][$productId]['quantity']
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Sản phẩm không tồn tại trong giỏ hàng'
            ]);
        }
        exit();
    }
?>
