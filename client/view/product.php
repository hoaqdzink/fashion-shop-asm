<div class="row">
    <!-- Filters Section -->
    <aside class="col-lg-3 col-md-4 d-none d-md-block">
        <h4>Filters</h4>
        <div class="mb-3">
            <h5>Size</h5>
            <?php 
                if(isset($sizes) && count($sizes) > 0){
                    foreach($sizes as $item){
                        echo '
                            <div>
                                <input type="checkbox" id="size-'.$item['name'].'"> 
                                <label for="size-'.$item['name'].'">'.$item['name'].'</label>
                            </div>
                        ';
                    }
                }
            ?>
        </div>
        <div class="mb-3">
            <h5>Màu sắc</h5>
            <div class="d-flex flex-wrap">
                <?php 
                    if(isset($colors) && count($colors) > 0){
                        foreach($colors as $item){
                            echo '
                                <span class="color-box" style="background-color: '.$item['hex_code'].';" data-color="'.$item['hex_code'].'"></span>
                            ';
                        }
                    }
                ?>
            </div>
        </div>
        <div class="mb-3">
            <h5>Giá</h5>
            <ul class="list-unstyled">
                <li><input type="radio" name="price" id="price1"> <label for="price1">Dưới 500.000 VNĐ</label></li>
                <li><input type="radio" name="price" id="price2"> <label for="price2">5000.000 - 1.000.000 VNĐ</label></li>
                <li><input type="radio" name="price" id="price3"> <label for="price3">1.000.000 - 3.000.000 VNĐ</label></li>
                <li><input type="radio" name="price" id="price4"> <label for="price4">Trên 3.000.000 VNĐ</label></li>
            </ul>
        </div>
        <div class="mb-3">
            <h5>Danh mục</h5>
            <ul class="list-unstyled">
                <?php 
                    if(isset($category) && count($category)>0) {
                        foreach($category as $item){
                            echo '
                                <li>
                                    <input type="radio" name="category" value="'.$item['name'].'">
                                    <label>'.$item['name'].'</label>
                                </li>
                            ';
                        }
                    }
                ?>
            </ul>
        </div>
    </aside>

    <!-- Products Section -->
    <section class="col-lg-9 col-md-8">
        <!-- Buttons for Grid View -->
        <div class="d-flex justify-content-end mb-3 button-grid">
            <button  onclick="setGrid(3)"><i class="fa fa-th-large" aria-hidden="true"></i></button>
            <button  onclick="setGrid(4)"><i class="fa fa-th" aria-hidden="true"></i></button>
        </div>

        <div id="product-grid" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <?php 
                if(isset($products) && count($products)>0){
                    foreach($products as $item){
                        // Lấy danh sách size của sản phẩm
                        $productSize = getProductSizeByIdProduct($item['ProductID']); 
                        
                        // Lọc tên size từ mảng $sizes
                        $sizeNames = [];
                        foreach ($sizes as $size) {
                            foreach ($productSize as $productSizeItem) {
                                if ($productSizeItem['size_id'] === $size['size_id']) {
                                    $sizeNames[] = $size['name'];
                                }
                            }
                        }

                        // Chuyển danh sách size thành chuỗi
                        $sizesString = implode(',', $sizeNames);
                        echo '
                             <a class="href-product col product mb-4" 
                            href="index.php?act=product-details&productId='.$item['ProductID'].'" 
                            style="display: none; text-decoration: none; color: inherit;" 
                            data-size="'.$sizesString.'"  
                            data-color="'.$item['Color'].'" 
                            data-category="'.$item['Category'].'" 
                            data-price="'.$item['Price'].'">
                                <div class="card">
                                    <img src="'.$item['Image'].'" class="card-img-top" alt="'.$item['ProductName'].'">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$item['ProductName'].'</h5>
                                        <p class="card-text card-price">'.$item['Price'].' VNĐ</p>

                                        <!-- Size -->
                                        <div class="product-sizes mb-2">
                                        <strong>Size:</strong>';
                                        foreach ($sizeNames as $sizeName) {
                                            echo '<span class="badge">' . htmlspecialchars($sizeName) . '</span>';
                                        }
                                        echo '      </div>
                                
                                                        <!-- Màu sắc -->
                                                        <div class="product-colors">
                                                            <strong>Colors:</strong>
                                                            <span class="color-box" style="background-color: '.htmlspecialchars($item['Color']).'"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        ';
                    }
                }else{
                    echo "Không có sản phẩm nào";
                }
            ?>           

        </div>

        <nav class="mt-4">
            <ul id="pagination" class="pagination justify-content-center"></ul>
        </nav>
    </section>
</div>