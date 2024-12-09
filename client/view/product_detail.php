<?php

if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $sizeId = $_POST['size_id'];
    $productName = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $cartId = $productId."-".$sizeId;
    if (isset($_SESSION['cart'][$cartId])) {
        $_SESSION['cart'][$cartId]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$cartId] = [
            'product_id' => $productId,
            'product_name' => $productName,
            'product_price' => $_POST['product_price'],
            'size_id' => $_POST['size_id'],
            'size_name' => $_POST['size_name'],
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
                <div class="d-flex flex-column">
                    <?php
                    if (isset($sizes) && is_array($sizes) && isset($productSize) && is_array($productSize)) {
                        $isFirst = true; // Biến để đánh dấu size đầu tiên
                        foreach ($sizes as $size) {
                            // Kiểm tra nếu size_id của size hiện tại có trong productSize
                            if (in_array($size['size_id'], array_column($productSize, 'size_id'))) {
                                // Xử lý tên size để tránh lỗi khi chứa dấu nháy
                                $sizeName = htmlspecialchars($size['name'], ENT_QUOTES, 'UTF-8');
                    ?>
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="size"
                                        id="size_<?php echo $size['size_id']; ?>"
                                        value="<?php echo $size['size_id']; ?>"
                                        <?php
                                        // Chọn size đầu tiên mặc định
                                        if ($isFirst) {
                                            echo 'checked';
                                            $isFirst = false;
                                        }
                                        ?>
                                        onclick="updateSize('<?php echo $size['size_id']; ?>', '<?php echo $sizeName; ?>')">
                                    <label class="form-check-label" for="size_<?php echo $size['size_id']; ?>">
                                        <?php echo $size['name']; ?>
                                    </label>
                                </div>
                    <?php
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
                <input type="hidden" id="selected_size_id" name="size_id">
                <input type="hidden" id="selected_size_name" name="size_name">
                <input type="hidden" name="quantity" id="hidden_quantity" value="1">
                <button type="submit" name="add_to_cart" class="btn btn-primary">Thêm vào giỏ hàng</button>
            </form>
            <!-- <button class="btn btn-dark w-50">Add to Cart</button> -->
        </div>
    </div>
</div>