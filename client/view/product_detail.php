<div class="container my-5">
    
    <div class="row">
        <!-- Product Images -->
        <div class="col-lg-6 d-flex">
            <!-- Thumbnail List -->
            <div class="me-3 d-flex flex-column align-items-start thumbnails subimages">
                <?php
                    if(isset($subimage) && count($subimage) > 0){
                        foreach($subimage as $item){
                            echo '
                                <img src="'.$item['urlImg'].'" alt="Thumbnail 1" class="img-fluid mb-2">
                            ';
                        }
                    }
                ?>
            </div>
            <!-- Main Image -->
            <div class="main-image-container ml-4">
                <img src="<?= $productId['main_image']?>" alt="Main Product" class="img-fluid main-image">
            </div>
        </div>
        <div class="col-lg-1"></div>
        <!-- Product Details -->
        <div class="col-lg-5">
            <h1 class="product-title"><?= $productId['name'] ?></h1>
            <p class="price">
                <span class="text-danger fw-bold"><?= number_format($productId['price'], 0, ',', '.')?> VNĐ</span> 
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
                                        echo '<span class="badge bg-light border me-2 mr-2">' .$sizeItem['name']. '</span>';
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
                        if(isset($colors) && count($colors) > 0){
                            foreach($colors as $item){
                                if($item['color_id'] == $productId['color_id']){
                                    echo '
                                        <span class="color-box" style="background-color: '.$item['hex_code'].'; border: 1px solid #000;"></span>
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
                    <button class="btn btn-outline-secondary">-</button>
                    <input type="number" class="form-control text-center" value="1">
                    <button class="btn btn-outline-secondary">+</button>
                </div>
            </div>
            <button class="btn btn-dark w-50">Add to Cart</button>

            <!-- Additional Actions -->
            <div class="mt-4">
                <a href="#" class="me-3">Compare</a>
                <a href="#" class="me-3">Ask a question</a>
                <a href="#">Share</a>
            </div>

            <!-- Delivery Info -->
            <div class="mt-4">
                <p><i class="bi bi-truck"></i> Estimated Delivery: Jul 30 - Aug 03</p>
                <p><i class="bi bi-box"></i> Free Shipping & Returns: On all orders over $75</p>
            </div>

            <!-- Payment Options -->
            <div class="mt-4">
                <img src="https://via.placeholder.com/150x50" alt="Payment Options" class="img-fluid">
                <p class="text-muted mt-2"><i class="bi bi-shield"></i> Guarantee safe & secure checkout</p>
            </div>
        </div>
    </div>
</div>