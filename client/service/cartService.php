<?php

    if (isset($_POST['update_quantity'])) {
        session_start();
        
        $cartId = $_POST['cart_id'];
        $action = $_POST['action'];
        if (isset($_SESSION['cart'][$cartId])) {
            $currentQuantity = $_SESSION['cart'][$cartId]['quantity'];
            if ($action == 'increase') {
                $_SESSION['cart'][$cartId]['quantity'] = $currentQuantity + 1;
                echo json_encode([
                    'success' => true,
                    'new_total' => number_format(($_SESSION['cart'][$cartId]['quantity'] * $_SESSION['cart'][$cartId]['product_price']), 0, ',', '.').' VNĐ',
                    'new_quantity' => $_SESSION['cart'][$cartId]['quantity']
                ]);
            } elseif ($action == 'decrease' && $currentQuantity > 1) {
                $_SESSION['cart'][$cartId]['quantity'] = $currentQuantity - 1;
                echo json_encode([
                    'success' => true,
                    'new_total' => number_format(($_SESSION['cart'][$cartId]['quantity'] * $_SESSION['cart'][$cartId]['product_price']), 0, ',', '.').' VNĐ',
                    'new_quantity' => $_SESSION['cart'][$cartId]['quantity']
                ]);
            } elseif ($action == 'remove') {
                unset($_SESSION['cart'][$cartId]);
                echo json_encode([
                    'success' => true
                ]);
            }
    
            // var_dump($_SESSION['cart']);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Sản phẩm không tồn tại trong giỏ hàng'
            ]);
        }
        exit();
    }
?>
