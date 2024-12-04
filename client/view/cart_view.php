<?php

if (!isset($_SESSION['idUser'])) {
    header('Location: index.php?act=login');
    exit();
}


if (isset($_POST['update_quantity'])) {
    $productId = $_POST['product_id'];
    $action = $_POST['action'];
    if (isset($_SESSION['cart'][$productId])) {
        $currentQuantity = $_SESSION['cart'][$productId]['quantity'];
        if ($action == 'increase') {
            $_SESSION['cart'][$productId]['quantity'] = $currentQuantity + 1;
        } elseif ($action == 'decrease' && $currentQuantity > 1) {
            $_SESSION['cart'][$productId]['quantity'] = $currentQuantity - 1;
        }
    }
    header("Location: index.php?act=cart-view");
    exit();
}


?>


<?php
// echo '<pre>';
// var_dump($_SESSION['cart']); // Xem dữ liệu giỏ hàng
// echo '</pre>';

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $productId => $product) {
        // Lấy thông tin sản phẩm từ giỏ hàng
        $productName = $product['product_name'];
        $productQuantity = $product['quantity'];
        $productPrice = $product['product_price'];
        $productImage = $product['product_image'];
        $totalPrice = $productQuantity * $productPrice;
?>
        <div class="card-cart">
            <div class="product-row-cart">
                <img src="<?= $productImage ?>" alt="<?= $productName ?>" class="product-image-cart">

                <div class="product-details-cart">
                    <h3 class="product-name-cart"><?= $productName ?></h3>

                    <div class="quantity-controls-cart">
                        <form method="POST" action="">
                            <input type="hidden" name="product_id" value="<?= $productId ?>">
                            <input type="hidden" name="action" value="decrease">
                            <button type="submit" name="update_quantity" class="quantity-btn-cart minus-btn-cart">-</button>
                        </form>

                        <span class="quantity-cart"><?= $productQuantity ?></span>

                        <form method="POST" action="">
                            <input type="hidden" name="product_id" value="<?= $productId ?>">
                            <input type="hidden" name="action" value="increase">
                            <button type="submit" name="update_quantity" class="quantity-btn-cart plus-btn-cart">+</button>
                        </form>
                    </div>
                    <p class="price-cart"><?= number_format($productPrice, 0, ',', '.') ?> VNĐ</p>
                    <p class="total-cart"><?= number_format($totalPrice, 0, ',', '.') ?> VNĐ</p>
                </div>
            </div>
        </div>
<?php
    }
}
?>

<div class="checkout-container-cart">
    <form method="POST" action="">
        <button type="submit" class="btn btn-checkout-cart">Thanh toán</button>
    </form>
</div>