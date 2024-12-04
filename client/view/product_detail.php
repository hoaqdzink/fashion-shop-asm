<?php

if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = [
            'product_name' => $productName,
            'product_price' => $_POST['product_price'],
            'product_image' => $_POST['product_image'],
            'quantity' => $quantity
        ];
    }
    header('Location: index.php?act=cart-view');
}
?>


<div class="container my-5">

    <div class="row">
        <!-- Product Images -->
        <div class="col-lg-6 d-flex">
            <!-- Thumbnail List -->
            <div class="me-3 d-flex flex-column align-items-start thumbnails subimages">
                <?php
                if (isset($subimage) && count($subimage) > 0) {
                    foreach ($subimage as $item) {
                        echo '
                                <img src="' . $item['urlImg'] . '" alt="Thumbnail 1" class="img-fluid mb-2">
                            ';
                    }
                }
                ?>
            </div>
            <!-- Main Image -->
            <div class="main-image-container ml-4">
                <img src="<?= $productId['main_image'] ?>" alt="Main Product" class="img-fluid main-image">
            </div>
        </div>
        <div class="col-lg-1"></div>
        <!-- Product Details -->
        <div class="col-lg-5">
            <h1 class="product-title"><?= $productId['name'] ?></h1>
            <p class="price">
                <span class="text-danger fw-bold"><?= number_format($productId['price'], 0, ',', '.') ?> VNĐ</span>
                <br>
                <del class="text-muted small"><?= number_format($productId['original_price'], 0, ',', '.') ?> VNĐ</del>
                <span class="badge bg-danger">Save <?= intval($productId['discount_percentage']) ?>%</span>
            </p>

            <!-- Sizes -->
            <div class="mb-3">
                <strong>Size:</strong>
                <div class="d-flex">
                    <?php
                    if (isset($sizes) && is_array($sizes) && isset($productSize) && is_array($productSize)) {
                        foreach ($productSize as $productItem) {
                            foreach ($sizes as $sizeItem) {
                                if ($productItem['size_id'] === $sizeItem['size_id']) {
                                    echo '<span class="badge bg-light border me-2 mr-2">' . $sizeItem['name'] . '</span>';
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Colors -->
            <div class="mb-3">
                <strong>Color:</strong>
                <div class="d-flex">
                    <?php
                    if (isset($colors) && count($colors) > 0) {
                        foreach ($colors as $item) {
                            if ($item['color_id'] == $productId['color_id']) {
                                echo '
                                        <span class="color-box" style="background-color: ' . $item['hex_code'] . '; border: 1px solid #000;"></span>
                                    ';
                            }
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Quantity and Add to Cart -->
            <div class="mb-4">
                <label for="quantity" class="form-label"><strong>Quantity:</strong></label>
                <div class="input-group" style="width: 120px;">
                    <button type="button" class="btn btn-outline-secondary" id="decrease">-</button>
                    <input type="number" class="form-control text-center" id="quantity-cart" name="quantity" value="1" min="1" required>
                    <button type="button" class="btn btn-outline-secondary" id="increase">+</button>
                </div>
            </div>

            <form action="" method="POST">
                <input type="hidden" name="product_id" value="<?= $productId['product_id'] ?>">
                <input type="hidden" name="product_name" value="<?= $productId['name'] ?>">
                <input type="hidden" name="product_price" value="<?= $productId['price'] ?>">
                <input type="hidden" name="product_image" value="<?= $productId['main_image'] ?>">
                <input type="hidden" name="quantity" id="hidden_quantity" value="1">
                <button type="submit" name="add_to_cart" class="btn btn-primary">Thêm vào giỏ hàng</button>
            </form>
            <!-- <button class="btn btn-dark w-50">Add to Cart</button> -->
        </div>
    </div>
</div>