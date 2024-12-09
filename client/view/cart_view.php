<?php

if (!isset($_SESSION['idUser'])) {
    header('Location: index.php?act=login');
    exit();
}

?>


<?php
// echo '<pre>';
// var_dump($_SESSION['cart']); // Xem dữ liệu giỏ hàng
// echo '</pre>';

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $cartId => $product) {
        // Lấy thông tin sản phẩm từ giỏ hàng
        $productName = $product['product_name'];
        $productQuantity = $product['quantity'];
        $productPrice = $product['product_price'];
        $productImage = $product['product_image'];
        $sizeName = $product['size_name'];
        $totalPrice = $productQuantity * $productPrice;
?>
        <div id="cart-id-<?= $cartId ?>" class="card-cart">
            <div class="product-row-cart">
                <img src="<?= $productImage ?>" alt="<?= $productName ?>" class="product-image-cart">

                <div class="product-details-cart">
                    <h3 class="product-name-cart"><a href="index.php?act=product-details&productId=<?= $cartId ?>"><?= $productName ?></a></h3>
                    <h3 class="product-name-cart">Size: <?= $sizeName ?></h3>

                    <div class="quantity-controls-cart">
                        <button class="quantity-btn-cart plus-btn-cart" data-cart-id="<?= $cartId ?>" data-action="decrease">-</button>
                        <span class="quantity-cart" id="quantity-<?= $cartId ?>"><?= $productQuantity ?></span>
                        <button class="quantity-btn-cart plus-btn-cart" data-cart-id="<?= $cartId ?>" data-action="increase">+</button>
                    </div>
                    <p class="price-cart"><?= number_format($productPrice, 0, ',', '.') ?> VNĐ</p>
                    <p id="totalAmount-<?= $cartId ?>" class="total-cart"><?= number_format($totalPrice, 0, ',', '.') ?> VNĐ</p>
                </div>
                <button class="quantity-btn-cart remove-btn-cart" data-cart-id="<?= $cartId ?>" data-action="remove">Xóa</button>
            </div>
        </div>
<?php
    }
?>
<div class="checkout-container-cart">
    <form method="POST" action="index.php?act=bill_payment">
        <button type="submit" class="btn btn-checkout-cart">Thanh toán</button>
    </form>
</div>
<?php
}
else{
    echo '<h1>Bạn chưa có gì trong giỏ hàng</h1>';
}
?>